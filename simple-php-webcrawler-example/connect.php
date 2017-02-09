<?php 
	require_once('errorflags.php');
	
	$host_name = 'localhost';
	$user_name = 'root';
	$password = '';
	$database = 'shrikrishna';
	$conn = mysqli_connect($host_name,$user_name,$password,$database) or die(" <h1> Connection Error </h1>"); 
?>