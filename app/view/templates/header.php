<?php 
	/* Create URL */
	//returns the current url
   	$url = $_SERVER['REQUEST_URI'];
	// Seperate it to array using the /
	$parts = explode('/' , $url);

	// Create root path
	$path = "";
	for ($i = 0; $i < count($parts) - 1; $i++) {

		if($parts[$i] != "view" AND $parts[$i] != "app"){
			$path .= $parts[$i] . "/";
		}

	}
 ?>

	<!-- Common css links(navbar, footer) -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path ?>app/view/css/navbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path ?>app/view/css/footer.css">
	<link rel="icon" type="image/png" href="<?php echo $path ?>app/view/img/logo.png" />
</head>
<body>
	<!-- Navbar -->
	<nav>
		<ul>
			<li><a href="<?php echo $path ?>">Home</a></li>
			<li><a href="<?php echo $path ?>app/view/profile.php">Profile</a></li>
			<!-- If user is admin -->
			<?php
				if (isset($_SESSION['admin'])){
					if($_SESSION['admin'] == 1)
					{ ?>
						<li><a href="<?php echo $path ?>app/view/admin/users.php">Admin</a></li>
					<?php 
					}
				}
			?>
			<li><a href="<?php echo $path ?>app/view/aboutus.php">About us</a></li>
			<li><a href="<?php echo $path ?>app/view/contact.php">Contact</a></li>
			<li id="logout"><a href="<?php echo $path ?>app/view/logout.php">Log out</a></li>
		</ul>
	</nav>