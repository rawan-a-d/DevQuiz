<?php 
	// db connection
	$host= "studmysql01.fhict.local";
	$port = "81";
	$username = "dbi414572";
	$password = "password";
	$db = "dbi414572";

	try {
	    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
	}
	// error catching/ exception
	catch(PDOEXCEPTION $e) {
	    print_r("Something went wrong: " . $e->getMessage());
	}
?>