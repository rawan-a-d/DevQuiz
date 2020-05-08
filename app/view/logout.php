<?php 
	session_start();

	// Unset all of the session variables.
	unset($_SESSION['userId']);
	unset($_SESSION['username']);
	unset($_SESSION['remember_me']);
	// Finally, destroy the session.    
	session_destroy();

	/* Create URL */
	//returns the current url
	$url = $_SERVER['REQUEST_URI'];
	// Seperate it to array using the /
	$parts = explode('/' , $url);

	// Create root path
	$path = "";
	for ($i = 0; $i < count($parts) - 1; $i++) {

	 		$path .= $parts[$i] . "/";

	}

	// Add login file name
	$path .= "login.php";

	// Include URL for Login page to login again.
	header("Location: $path");
 ?>