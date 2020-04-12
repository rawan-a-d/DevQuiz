<?php
	/* Check session */
	include('config/session.php');

	/* Signup */
	include('mysql/functions.php');

	// initilize needed variabled to display entered data
	$name = $email = $password = $confirm_password = $remember_me = '';

	$emailExists = '';

	// If post request was sent
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// If email doesn't exists in db
		if(!emailExists($email)){
			signup($name, $email, $password);
		}
		else {
			$emailExists = 'A user with this e-mail already exists';
		}	
	}
?>

<!DOCTYPE html>
<html>
	<!-- Include header -->
	<?php include('templates/header_login.php') ?>
		<div id="container">
			<form id="form" action="signup.php" method="POST" onsubmit="return validateForm()">
				<!-- Three inputs for credentials -->
				<input class="credentials" id="name" type="text" name="name" placeholder="Name">
				<!-- Display errors -->
				<div class="error" id="nameErr">
				</div>
				<input class="credentials" id="email" type="email" name="email" placeholder="E-mail address">
				<!-- Display errors -->
				<div class="error" id="emailErr">
				</div>
				<input  class="credentials" id="password" type="password" name="password" placeholder="Password">
				<!-- Display errors -->
				<div class="error" id="passwordErr">
				</div>
				<input  class="credentials" id="confirmPassword" type="password" name="confirm_password" placeholder="Repeat password">
				<!-- Display errors -->
				<div class="error" id="confirmPasswordErr">
				</div>

				<!-- Buttons login and sign up -->
				<div id="wrapper">
					<button id="login">
						<a href="login.php">
							Login
						</a>
					</button>
					<button id= "signup" type="submit" name="submit">
						<a>
							Sign up
						</a>
					</button>
				</div>
				<!-- Email exists error -->
				<div class="error">
					<?php echo $emailExists; ?>
				</div>
			</form>
		</div>
		<!-- JS -->
		<script type="text/javascript" src="js/signup.js"></script>
	</body>
</html>