		<!-- Common css links(navbar) -->
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="icon" type="image/png" href="img/logo.png" />
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<!-- Top Navbar -->
		<nav>
			<ul id="topnav" class="navbar">
				<li class="topnav_item"><a href="users.php">Dev Quiz Admin</a></li>
				<!-- Display user name -->
				<li class="dropdown topnav_item">
					<button class="dropbtn"><?php echo $_SESSION['username']; ?>
						<i class="fa fa-caret-down"></i>
					</button>
					<!-- Link to profile and logout -->
					<div class="dropdown-content">
						<a href="../profile.php">Profile</a>
						<a href="../logout.php">Log out</a>
					</div>
				  </li> 
				  <!-- Link to home page -->
				<li class="topnav_item" id="home"><a href="../../../index.php">HOME SITE</a></li>
			</ul>
		</nav>
		<!-- Side navbar -->
		<div class="secondarynav">
			<nav role="navigation" class="menu">
				<div class="overflow-container">
					<ul class="menu-dropdown">
						<!-- Quizzes -->
						<li><a href="quizzes.php">Quizzes</a><span class="icon"><i class="fa fa-question"></i></span></li>
						<!-- Users -->
						<li class="menu-hasdropdown">
							<a href="users.php">Users</a><span class="icon"><i class="fa fa-users"></i></span>

							<label title="toggle menu" for="users">
								<span class="downarrow"><i class="fa fa-caret-down"></i></span>
						  	</label>
							<input type="checkbox" class="sub-menu-checkbox" id="users" />

							<ul class="sub-menu-dropdown">
								<li class="users_item"><a href="users.php?source">View all users</a></li>
								<li class="users_item"><a href="users.php?source=add_user">Add user</a></li>
		            		</ul>
						</li>
						<!-- Messages -->
						<li><a href="messages.php">Messages</a><span class="icon"><i class="fa fa-envelope"></i></span></li>
					</ul>
				</div>
			</nav>
		</div>