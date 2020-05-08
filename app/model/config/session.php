<?php 
	// Start user session
	session_start();

	/* Create URL */
	//returns the current url
	$url = $_SERVER['REQUEST_URI']; 
	// Seperate it to array using the /
	$parts = explode('/' , $url);

	// Create root path
	$path = "";
	for ($i = 0; $i < count($parts) - 1; $i++) {
		if($parts[$i] != "app" && $parts[$i] != "view" && $parts[$i] != "admin"){
			$path .= $parts[$i] . "/";
		}
	}

	// Add login path
	$path .= "app/view/login.php";

	// If no session was found and the current page isn't login or signup
	if ((!isset($_SESSION['username'])) && basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'signup.php'){
		echo 'No session was found, redirect to login';
		// Not logged in
		// Redirect to login
		header("Location: $path");
	}
?>