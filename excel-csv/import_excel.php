<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSV Example</title>
  <meta charset="utf-8">
 </head>

 <body>
 	<form method="post" enctype="multipart/form-data">
 		<input type="file" name="excel_file" />
 		<input type="submit" name="import" value="Import" />
 	</form>
 </body>
 </html>
 <?php
	require_once('PHPExcel/PHPExcel.php');
	require_once('PHPExcel/PHPExcel/IOFactory.php');

	if(isset($_POST['import']) && isset($_FILES['excel_file'])){
		$filename = $_FILES['excel_file']['tmp_name'];

		try{
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
    		$objPHPExcel = $objReader->load($filename);	
		}
		catch(Exception $e){
			die(" Exception Occurred: ".$e->getMessage());
		}

		  //  Get worksheet dimensions
  		$sheet = $objPHPExcel->getSheet(0); // Access the first sheet
  		$highestRow = $sheet->getHighestRow();
  		$highestColumn = $sheet->getHighestColumn();
		
		//  Loop through each row of the worksheet in turn
  		for ($row = 2; $row <= $highestRow; $row++){

	    	//  Read a row of data into an array
	    	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	    	NULL,
	    	TRUE,
	    	FALSE);

	    	$toDate = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][0],PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
    		$formattedDate = \DateTime::createFromFormat('d/m/y', $toDate)->format('Y/m/d');
    		echo "[[$formattedDate]]";
    		echo date('d-m-Y',$formattedDate);
	    	// OR
	    	
	    	// Handle date 
	    	$date = ($rowData[0][0] - 25569) * 86400;
	    	$dt = gmdate('d-m-Y',$date);

	    	echo $dt;
	    	for($j=1;$j<40;$j++){
	      		echo $rowData[0][$j] . "|" ;
	    	}

	    	echo "<br/><br/>";
		}
	}
?>