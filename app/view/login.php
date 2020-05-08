<?php
	// Paths
	$configPath = "../model/config";

	/* Check session */
	include("$configPath/session.php");

	/* Include classes */
  	include_once("../../includes/autoload.inc.php");

	$email = $password = "";
	$credentialsErr = "";

	// If post request was sent
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		/* Create controller object */
		$controller = new UserController();
		/* Login */
		$credentialsCorrect = $controller->login($email, $password);

		if(!$credentialsCorrect){
			$credentialsErr = "Wrong credentials";
		}
		else {
			$credentialsErr = "";
		}
	}
?>

<!DOCTYPE html>
<html>
	<!-- Include header -->
	<?php include('templates/header_login.php') ?>

		<div id="container">
			<form action="login.php" method="POST" onsubmit="return validateForm()">
				<!-- Two inputs for credentials -->
				<input class="credentials" id="email" type="email" name="email" placeholder="E-mail address"autocomplete="on">
				<!-- Display errors -->
				<div class="error" id="emailErr">
				</div>

				<input  class="credentials" id="password" type="password" name="password" placeholder="Password" autocomplete="on">
				<!-- Display errors -->
				<div class="error" id="passwordErr">
				</div>

				<!-- Remember me -->
				<input type="checkbox" name="remember_me" id="remember_me"> 
				<label for="remember_me">Remember me</label>
				<!-- Buttons login and sign up -->
				<div id="wrapper">
					<button id="login" type="submit" name="submit">
						<a>
							Login
						</a>
					</button>
					<button id= "signup">
						<a href="signup.php">
							Sign up
						</a>
					</button>
				</div>
				<!-- Wrong credentials error -->
				<div class="error" id="credentialsErr">
					<?php echo $credentialsErr; ?>
				</div>
			</form>
		</div>

		<!-- JS -->
		<script type="text/javascript" src="js/login.js"></script>
	</body>
</html>