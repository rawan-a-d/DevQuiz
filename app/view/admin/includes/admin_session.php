<?php 
	// Start user session
	//session_start();

	if($_SESSION['admin'] != 1){
		header("Location: ../../../index.php");
	}
?>