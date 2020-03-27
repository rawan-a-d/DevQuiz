<?php 
	// Start user session
	session_start();

	// If no session was foundd and the current page isn't login or signup
	if ((!isset($_SESSION['username'])) && ((basename($_SERVER['PHP_SELF']) != 'login.php') && (basename($_SERVER['PHP_SELF']) != 'signup.php'))){
		echo 'No session was found, redirect to login';
		// Not logged in
		// Redirect to login
		header('Location:login.php');
	}
?>