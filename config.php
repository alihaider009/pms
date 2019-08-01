<?php

	//session_start();

	$DB_SERVER = "localhost";
	$DB_USERNAME = "root";
	$DB_PASSWORD = "";
	$DB_DATABASE = "pms";
	//define('DB_SERVER', 'localhost');
	//define('DB_USERNAME', 'root');
	//define('DB_PASSWORD', '');
	//define('DB_DATABASE', 'pms');
	$db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
	
	//$url = "http://demos.eggslab.net/email-confirmation-php/";
	$url = "<a href='http://localhost/pharmacy_management_system/confirm.php'>A</a>";
	
?>