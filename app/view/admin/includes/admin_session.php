<?php 
	// if not admin
	if($_SESSION['admin'] != 1){
		header("Location: ../../../index.php");
	}
?>