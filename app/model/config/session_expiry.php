<?php 
	// Rememeber me
	// If user wants to be remembered, keep his session as long as he's logged in

	/* Create URL */
	//returns the current url
	$url = $_SERVER['REQUEST_URI']; 
	// Seperate it to array using the /	
	$parts = explode('/' , $url);

	// Create root path
	$path = "";
	for ($i = 0; $i < count($parts) - 1; $i++) {
		if($parts[$i] != "view" && $parts[$i] != "app"){
			$path .= $parts[$i] . "/";
		}
	}

	// Add login path
	$path .= "app/view/login.php";

	// If not remove his session after 1 hour
	if(isset($_SESSION['userId']) && !isset($_SESSION['remember_me'])) {
		$current_time = time();
		if($current_time - $_SESSION['loggedin_time'] >= 3600){
			session_start();

			// Unset all of the session variables.
			unset($_SESSION['userId']);
			unset($_SESSION['username']);
			unset($_SESSION['remember_me']);
			// Finally, destroy the session.    
			session_destroy();

			// Include URL for Login page to login again.
			header("Location: $path");
		}
	}
?>