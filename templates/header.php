<!-- Common css links(navbar, footer) -->
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
	<!-- Navbar -->
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="profile.html">Profile</a></li>
			<!-- If user is admin -->
			<?php
				if (isset($_SESSION['admin'])){
					if($_SESSION['admin'] == 1)
					{ ?>
						<li><a href="admin.php">Admin</a></li>
					<?php 
					}
				}
			?>
			<li><a href="aboutus.php">About us</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li id="logout"><a href="logout.php">Log out</a></li>
		</ul>
	</nav>