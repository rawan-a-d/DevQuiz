<?php  ?>

<!DOCTYPE html>
<html>
	<!-- Include header -->
	<?php include('templates/header_login.php') ?>
		<div id="container">
			<form method="" target="">
				<!-- Three inputs for credentials -->
				<input class="credentials" type="text" name="name" placeholder="Name">
				<input class="credentials" type="email" name="email" placeholder="E-mail address">
				<input  class="credentials"type="password" name="password" placeholder="Password">
				<!-- Remember me -->
				<input type="checkbox" name="remember_me" id="remember_me"> 
				<label for="remember_me">Remember me</label>
				<!-- Buttons login and sign up -->
				<div id="wrapper">
					<button id="login">
						<a href="login.html">
							Login
						</a>
					</button>
					<button id= "signup" type="submit">
						<a>
							Sign up
						</a>
					</button>
				</div>
			</form>
		</div>
	</body>
</html>