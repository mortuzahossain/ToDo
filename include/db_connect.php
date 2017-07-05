<?php
	
	require_once 'constant.php';

	$host   = DB_HOST;
 	$user   = DB_USER;
 	$pass   = DB_PASS;
 	$dbname = DB_NAME;

	$conn = mysqli_connect($host,$user,$pass,$dbname);

?>