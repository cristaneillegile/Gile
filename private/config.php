<?php
	$localhost = "localhost";
	$user = "root";
	$pass = "";
	$dbase = "test_prelim1";
	$port = 3307;


	$con = mysqli_connect($localhost, $user, $pass, $dbase, $port) or die("Sorry cant connect");

?>