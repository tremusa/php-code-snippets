<?php
	// No validations are performed here.
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$veh1 = $_POST['vehicle1'];
	$veh2 = $_POST['vehicle2'];

	// if file is selected , its moved to current folder
	// name is given by default as uploaded.jpg
	if(!empty($_FILES['profile_pic']['name']))
		move_uploaded_file($_FILES['profile_pic']['tmp_name'],"uploaded.jpg");
?>

<table width="100%" border="1">
	<tr>
		<th> Name </th>
		<th> Password </th>
		<th> Contact </th>
		<th> Gender </th>
		<th> Vehicle1 </th>
		<th> Vehicle2 </th>
		<th> Image </th>
	</tr>
	
	<tr>
		<th> <?=$name?> </th>
		<th> <?=$password?> </th>
		<th> <?=$contact?> </th>
		<th> <?=$gender?> </th>
		<th> <?=$veh1?> </th>
		<th> <?=$veh2?> </th>
		<th> <img src="uploaded.jpg" width="250" height="150"> </th>
	</tr>
</table>