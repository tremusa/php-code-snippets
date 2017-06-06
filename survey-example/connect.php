<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'survey';

	$conn = mysqli_connect($hostname,$username,$password,$database) or die("Connection problem !");
?>

<style>
	a{
		text-decoration:none;
		color: black;
		border-bottom: dashed 1px grey;
	}
</style>