<?php  ?>

<!DOCTYPE html>
<html>
	<!-- Include header -->
	<?php include('templates/header_login.php') ?>
		<div id="container">
			<form method="" target="">
				<!-- Two inputs for credentials -->
				<input class="credentials" type="email" name="email" placeholder="E-mail address">
				<input  class="credentials"type="password" name="password" placeholder="Password">
				<!-- Remember me -->
				<input type="checkbox" name="remember_me" id="remember_me"> 
				<label for="remember_me">Remember me</label>
				<!-- Buttons login and sign up -->
				<div id="wrapper">
					<button id="login" type="submit">
						<a>
							Login
						</a>
					</button>
					<button id= "signup">
						<a href="signup.html">
							Sign up
						</a>
					</button>
				</div>
			</form>
		</div>
	</body>
</html>