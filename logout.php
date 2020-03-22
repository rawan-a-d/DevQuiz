<?php 
	session_start();

	// Unset all of the session variables.
	unset($_SESSION['userId']);
	unset($_SESSION['username']);
	unset($_SESSION['remember_me']);
	// Finally, destroy the session.    
	session_destroy();

	// Include URL for Login page to login again.
	header("Location: login.php");
 ?>