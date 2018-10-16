<?php
// =========================================================
//  This code allows us connect with phonebook database
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================
	// database connection
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "phonebook";
	$connect = mysqli_connect($server, $user, $pass, $db);
	mysqli_set_charset($connect, "utf8");
	$error = mysqli_connect_error();

	// error handling
	if ($error) {
		echo "Error trying to connect: ".$error;
	}
?>
