<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSV Example</title>
  <meta charset="utf-8">
 </head>
 <body>
<?php
	
	if(isset($_POST['upload'])){
		
		unset($_POST['upload']);
		$file_name = basename($_FILES['csv_file']['name']);
		$name = pathinfo($file_name, PATHINFO_FILENAME );
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		
		$csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
		//skip first line
        $first = fgetcsv($csvFile);
        echo "<hr/>";
        print_r($first);
        echo "<hr/>";

		$flag = true; // flag set false when query fails for one or more records
		$i=0;

		while($line = fgetcsv($csvFile)){
			$j=0;
			while($j<count($line)){
				echo "$line[$j] |";
				$j++;
			}
			echo "<br>";
			$i++;
			if($i==10)
				break;
		}
		if($flag)
			echo "<h1 style='color:limegreen'> All records imported successfully ! </h1>";
		else
			echo " Error while fetching one or more records";
		
		fclose($csvFile);
	}
	?>

<form method="post" action="import_csv.php" enctype="multipart/form-data">
	<input type="file" name="csv_file" id="csv_file" accept=".csv" >
	<input type="submit" name="upload" id="upload" >
	<input type="submit" name="delete" value="delete" >
</form>
</body>
</html>