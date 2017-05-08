<?php
	// Export data to excel file
	require_once('connect.php');
	
	// For excel sheet
	header("Content-Type: application/vnd.ms-excel"); //
	header("Content-disposition: attachment; filename=spreadsheet.xls");
	
	// For CSV file
	//header("Content-type: text/x-csv");
	//header("Content-disposition: attachment; filename=spreadsheet.csv"); 
	
	$query = "select * from AA_users";
	$result = mysqli_query($conn,$query);
	
	echo "First Name \tLast Name \tEmail\n";
	while($row = mysqli_fetch_assoc($result)){
		echo "$row[fname] \t $row[lname] \t $row[email]\n";
	}
?>