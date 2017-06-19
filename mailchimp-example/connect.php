<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'practice';

	$conn = mysqli_connect($hostname,$username,$password,$database) or die("Connection problem !");

	define('MAILCHIMP_API_KEY','ebbddeb6038485bb656bea117c6deb67-us15');
	define('TEST_LIST_ID','7d78b5e304');
?>