<!-- Main source file that does the crawling and processing -->
<!DOCTYPE html>
<meta charset="UTF-8" />

<?php
	header("Content-Type: text/html; charset=UTF-8"); 
	require_once('connect.php');
	require_once('errorflags.php');
	require_once('sendMail.php');

	$url1 = "https://www.min-breeder.com/dog";
	$url2 = ".html";

	mysqli_set_charset($conn, 'utf8mb4');

	$query = "select * from registered_dogs where MB_ID != '' and Dog_ID=274 ";

	$result = mysqli_query($conn,$query);
	$i=1;
	$error_count=0;
	// create table for mail
	$errorTable ="";
	$errorTable .= "<h1 style='color:black;' align='center'> Update Errors </h1> ";
	$errorTable .= "<table border='1' cellspacing='0'>
						<tr>
							<th> Number </th>
							<th> Error Details </th> 
						</tr>";
	$table = "";
		$table .= "<h1 style='color:black;' align='center' > Min-Breed Update Status </h1>";
		$table .= "<table border='1' cellspacing='0'>
						<tr>
							<th> Dog_ID </th>
							<th> Old Status </th>
							<th> New Status </th>
							<th> Old Price </th>
							<th> New Price </th>
						</tr>";

	while($row = mysqli_fetch_assoc($result)){

		// fetch data to compare and relatively update table
		$old_price = $row['Price'];
		$old_status = $row['Status'];
		$MB_ID = $row['MB_ID'];
		$id = $row['Dog_ID'];


		$url = $url1 . $MB_ID . $url2;
		
		$data = scanContent($url);
		
		//echo "Status : $data[status] , Price : $data[price] <hr>";
		if($old_price != $data['price'] || $old_status != $data['status']){
			echo "<blockquote> OLD=>$old_price New=>$data[price] Old=>$old_status New=>$data[status] </blockquote>";
			$res = mysqli_query($conn,"update registered_dogs set Price=$data[price] , Status='$data[status]' where Dog_ID=$id");
			if($res){
				$table .= "<tr>
						<td> $id </td>
						<td style='color:red;'> $old_status </td>
						<td style='color:green;'> $data[status] </td>
						<td style='color:red;'> $old_price </td>
						<td style='color:green;'> $data[price] </td>
					</tr>";
				//echo "<h1 style='color:limegreen;'> Table Data Updated Successfully ! </h1>";
			}
			else{
				$error_count++;
				$errorTable .= "<tr>
									<td> $error_count </td>
									<td style='color:red;'> $conn->error </td>
								</tr>";
				//echo "<h1 style='color:red;'> Error: Cannot update table data ! $conn->error</h1>";
			}
		}
		else{			
			//echo "<h1 style='color:aqua;'> No Update Required !</h1> ";
		}
	}

	$table.= "</table>";
	$errorTable.= "</table>";
	$errorTable.="<h1 align='center'> Total Error Count = <span style='color:red;'> $error_count </span> </h1>";

	//echo $errorTable;
	// send mail to the admin with content
	//$status = "Senta";
	$status = sendMail("shrikrishna.shanbhag@intecons.com","Min-Breed Data Update",$table.$errorTable);
	if($status == "Sent")
		echo "<h1 style='color:limegreen;'> Mail Sent Successfully </h1>";
	else
		echo "<h1 style='color:red;'> Could not send mail : $status ";
	

	// scan the url and return array with status and price
	function scanContent($url){
		$content = file_get_contents($url);
		$pos = strpos($content,'<th>状況</th>');
		$keystring = substr($content,$pos+42,15);

		if(strstr($keystring,"販売中")!=false){
			$data['status'] = "Available";
			$data['price'] = getDogPrice($content,$url);
		}
		else if(strstr($keystring,"商談中")!=false){
			$data['status'] = "Negotiation";
			$data['price'] = getDogPrice($content,$url);
		}
		else if(strstr($keystring,"成約済み")!=false){
			$data['status'] = "Sold";
			$data['price'] = getDogPrice($content,$url);
		}
		else{
			$data['status'] = "Deleted";
			$data['price'] = getDogPrice($content,$url);
		}
		//echo "<em> $data[status] <==> $data[price] </em> <hr>";
		return $data;
	}

	// scan the url content and return price value if available else 0
	function getDogPrice($content,$url){
		//echo $url;
   		// scan content to get price
   		$xml = new DOMDocument();
   		$xml->loadHTMLFile($url,LIBXML_NOWARNING); 
   		foreach($xml->getElementsByTagName('font') as $link) { 

   			if($link->getAttribute('color') == "red"){

   				if($link->nodeValue != "─"){
        			$price = (int)str_replace(',', "", $link->nodeValue);
   				}
        		else{
        			$price = 0;
        		}

        		break;
   			}
        	//echo "<h2> <em>". var_dump($price) ."</em> </h2>";
    	}
   			return $price;
   	}

?>