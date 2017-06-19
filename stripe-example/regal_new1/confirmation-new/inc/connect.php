<?php
error_reporting(0);
date_default_timezone_set('America/New_York');
if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'SERVER'){
	$username = 'root'; //your_name
	$password = ''; //your_passwor
	$hostname = 'localhost'; //host name
	$database = 'rw2';
    define("SITE_PATH","http://localhost/Regalwings/confirmation-new/");
}
else{
	$username = 'rwdis'; //your_name
    $password = 'Deck141#'; //your_password
    $hostname = 'localhost'; //host name
    $database = 'rwdis';
    define("SITE_PATH","https://www.regalwings.com/confirmation-new/");
}
$connect = mysqli_connect($hostname, $username, $password,$database) or die('Unable to connect to MySQL'.mysqli_connect_error());
define("COMPANY_NAME","Regal Wings");

?>