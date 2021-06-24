<?php

	$name = "root";
	$pass = "";
	$host = "localhost";
	$dbname = "blog";

	$conn = mysqli_connect($host,$name,$pass,$dbname) or die("connection failed :" .mysqli_connect_error());

?>
