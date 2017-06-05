<?php

//var_dump($_POST);
if(isset($_POST['proceed'])){
	// [todo] add selective upload
	if(isset($_POST['proceed'])){
		if(isset($_FILES['csv'])){
			// check folder permissions
			move_uploaded_file($_FILES['csv']['tmp_name'], 'csv/'.$_FILES['csv']['name']);
			$filename = 'csv/'.$_FILES['csv']['name'];
			$csvFile = fopen($filename,'r');
			if(isset($_POST['header']) && $_POST['header']=='yes'){
				$header = fgetcsv($csvFile);
				$hdr='yes';
			}
			else{
				$header = array('Column1','Column2','Column3','Column4','Column5');
				$hdr='no';
			}
			// $count = 0;
			// while($line = fgetcsv($csvFile)){
			// 	$query = "insert into items values ('$line[0]','$line[1]',$line[2],$line[3],'$line[4]')";
			// 	if(!mysqli_query($conn,$query)){
			// 		echo setMessage('e','Error in insert:'.mysqli_error($conn));
			// 	}
			// 	else
			// 		$count++;
			// }
			// fclose($csvFile);
			// echo setMessage('success',$count.' records imported successfully');
		}
		else{
			echo setMessage('e','Please select a csv file');
		}
	}
}



?>
<style type="text/css">
	table{
		border-collapse: collapse;
		height:25%;
	}	
</style>

<form method="post" action="process_upload.php" onsubmit="return validate()">
	<table border="1">
		<tr>
			<th> <?=$header[0]?></th>
			<th> <?=$header[1]?></th>
			<th> <?=$header[2]?></th>
			<th> <?=$header[3]?></th>
			<th> <?=$header[4]?></th>
		</tr>

		<tr>
			<th> 
				<select name='0' id="0">
					<option value='0'>item_code</option>
					<option value='1'>item_name</option>
					<option value='2'>item_price</option>
					<option value='3'>opening_quantity</option>
					<option value='4'>item_image</option>
				</select>
			</th>
			<th> 
				<select name='1' id="1">
					<option value='0'>item_code</option>
					<option value='1'>item_name</option>
					<option value='2'>item_price</option>
					<option value='3'>opening_quantity</option>
					<option value='4'>item_image</option>
				</select>
			</th>
			<th> 
				<select name='2' id="2">
					<option value='0'>item_code</option>
					<option value='1'>item_name</option>
					<option value='2'>item_price</option>
					<option value='3'>opening_quantity</option>
					<option value='4'>item_image</option>
				</select>
			</th>
			<th> 
				<select name='3' id="3">
					<option value='0'>item_code</option>
					<option value='1'>item_name</option>
					<option value='2'>item_price</option>
					<option value='3'>opening_quantity</option>
					<option value='4'>item_image</option>
				</select>
			</th>
			<th> 
				<select name='4' id="4">
					<option value='0'>item_code</option>
					<option value='1'>item_name</option>
					<option value='2'>item_price</option>
					<option value='3'>opening_quantity</option>
					<option value='4'>item_image</option>
				</select>
			</th>
		</tr>

		<?php
			$cnt = 0;
			while($line = fgetcsv($csvFile)){
				if($cnt==1)
					break;
				?>
				<tr>
					<td>  <?=$line[0]?> </td>
					<td>  <?=$line[1]?> </td>
					<td>  <?=$line[2]?> </td>
					<td>  <?=$line[3]?> </td>
					<td>  <?=$line[4]?> </td>
				</tr>
				<?php
				$cnt++;
			}
		?>
	</table><br/><br/>
	<input type="hidden" name="header" value="<?=$hdr?>" />
	<input type="hidden" name="filename" value="<?=$filename?>" />
	<input type="submit" name="upload" value="Upload data" />
</form>

<script type="text/javascript">
	function validate(){
		var col1 = document.getElementById('0').value;
		var col2 = document.getElementById('1').value;
		var col3 = document.getElementById('2').value;
		var col4 = document.getElementById('3').value;
		var col5 = document.getElementById('4').value;

		var columns = [col1,col2,col3,col4,col5];

		if(hasDuplicates(columns)){
			alert("please select distinct columns from drop down");
			return false;
		}

		return true;
	}

	function hasDuplicates(array) {
 	   return (new Set(array)).size !== array.length;
	}
</script>