<?php 
	
	if (isset($_POST['email'])){
		//session_start();
		$host='127.0.0.1';
		$port='3306';
		$dbname='dbi414572';
		$user='root';
		$pass='';
		$db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname,$user,$pass);
		$getUsers = $db->prepare("SELECT * FROM users;");
		$getUsers->execute();
		$users = $getUsers->fetchAll();
		
		foreach ($users as $user) {
			
			// test passw
			if ($user['email']==$_POST['email'] && md5($_POST['password'])==$user['password'])
			{
				$_SESSION['login']=$user['name'];
				if($user['isAdmin']==1) $_SESSION['admin']=1;
				else $_SESSION['admin']=0;
				header('Location: /');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<!-- Include header -->
	<?php include('templates/header_login.php') ?>
		<div id="container">
			<form method="POST" target="/">
				<!-- Two inputs for credentials -->
				<input class="credentials" type="email" name="email" placeholder="E-mail address">
				<input  class="credentials"type="password" name="password" placeholder="Password">
				<!-- Remember me -->
				<input type="checkbox" name="remember_me" id="remember_me"> 
				<label for="remember_me">Remember me</label>
				<!-- Buttons login and sign up -->
				<div id="wrapper">
					<button id="login" type="submit">
						
							Login
						
					</button>
					<button id= "signup">
						
							Sign up
						
					</button>
				</div>
			</form>
		</div>
	</body>
</html>