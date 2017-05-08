<?php
	// Export data to csv file
	require_once('connect.php');
	
	// For CSV file
	header("Content-type: text/x-csv");
	header("Content-disposition: attachment; filename=newfile.csv"); 
		
	$query = "select * from AA_users";
	$result = mysqli_query($conn,$query);
	
	echo "First Name,Last Name,Email\n";
	while($row = mysqli_fetch_assoc($result)){
		echo "$row[fname],$row[lname],$row[email]\n";
	}
?>