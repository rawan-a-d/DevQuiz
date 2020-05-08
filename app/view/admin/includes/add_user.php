<?php 
	/* CREATE USER */
	if (isset($_POST['create_user'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$university = $_POST['university'];
		$birthday = $_POST['birthday'];
		$program = $_POST['program'];
		$role = $_POST['role'];
		$password = $_POST['password'];

		$controller = new UserController();
        $controller->addUser($name, $email, $university, $birthday, $program, $role, $password);
	}
 ?>


<!-- Enctype send multiple/different form data(image and text) -->
<form action="" method="post" enctype="multipart/form-data">
	<!-- Name -->
	<div class="form-group">
		<label for="name">Name</label>
		<input class="form-control" type="text" name="name">
	</div>
	<!-- Email -->
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="text" name="email">
	</div>
	<!-- Role -->
	<div class="form-group">
		<label for="role">Role</label>
		<select name="role" id="role" value="subscriber">
			<option value="subscriber">Select a role</option>
			<option value="subscriber">subscriber</option>
			<option value='admin'>Admin</option>
		</select>
	</div>
	<!-- Password -->
	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="text" name="password">
	</div>
	<!-- Birthday -->
	<div class="form-group">
		<label for="birthday">Birthday</label>
		<input class="form-control" type="date" name="birthday">
	</div>
	<!-- University -->
	<div class="form-group">
		<label for="university">University</label>
		<input class="form-control" type="text" name="university">
	</div>
	<!-- Program -->
	<div class="form-group">
		<label for="program">Program</label>
		<input class="form-control" type="text" name="program">
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>
</form>