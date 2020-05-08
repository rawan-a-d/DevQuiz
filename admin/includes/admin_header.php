		<!-- Common css links(navbar) -->
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!-- Top Navbar -->
		<nav>
			<ul id="topnav" class="navbar">
				<li class="topnav_item"><a href="index.php">Dev Quiz Admin</a></li>
				<li class="dropdown topnav_item">
					<button class="dropbtn"><?php echo $_SESSION['username']; ?>
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../profile.php">Profile</a>
						<a href="../logout.php">Log out</a>
					</div>
				  </li> 
				<li class="topnav_item" id="home"><a href="../index.php">HOME SITE</a></li>
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