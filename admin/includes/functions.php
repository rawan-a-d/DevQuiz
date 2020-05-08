<?php 
	/* USER */
	function createUser($name, $email, $university, $birthday, $program, $role, $password){
		global $conn;

		// Encrypt password
		$hashFormat = "$2y$10$";

		$salt = "iusesomecrazystrings22";

		$hash_and_salt = $hashFormat . $salt;

		$password = crypt($password, $hash_and_salt);

		try{
			$query = "INSERT INTO users(name, email, university, birthday, program, role, password) ";
			$query .= "VALUES(:name, :email, :university, :birthday, :program, :role, :password) ";

			$statement = $conn -> prepare($query);

			// bind parameters to values
		    $statement->bindParam(':name', $name);
		    $statement->bindParam(':email', $email);
		    $statement->bindParam(':university', $university);
		    $statement->bindParam(':birthday', $birthday);
		    $statement->bindParam(':program', $program);
		    $statement->bindParam(':role', $role);
		    $statement->bindParam(':password', $password);

			$statement->execute();
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}
	}


	function deleteUser($id){
		global $conn;

		try {
			$sql = "DELETE FROM users WHERE id = :id";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':id', $id);

			$statement->execute();
		}
		catch(PDOEXCEPTION $e) {
			print_r("Something went wrong: " . $e->getMessage());
		}
	}

	function updateUser($name, $email, $university, $birthday, $program, $role, $id){
		global $conn;

		$query = "UPDATE users SET ";
		$query .= "name = :name, ";
		$query .= "email = :email, ";
		$query .= "role = :role, ";
		$query .= "university = :university, ";
		$query .= "birthday = :birthday, ";
		$query .= "program = :program ";
		$query .= "WHERE id = :id";

		$statement = $conn -> prepare($query);

		// bind parameters to values
	    $statement->bindParam(':name', $name);
	    $statement->bindParam(':email', $email);
	    $statement->bindParam(':university', $university);
	    $statement->bindParam(':birthday', $birthday);
	    $statement->bindParam(':program', $program);
	    $statement->bindParam(':role', $role);
	    $statement->bindParam(':id', $id);

		$statement->execute();
	}


	function getAllUsers(){
		global $conn;

		$sql = "SELECT * FROM users";

		$statement = $conn -> prepare($sql);

		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}


	function updateUserToAdmin($id){
		global $conn;

		$sql = "UPDATE users SET role = 'admin' WHERE id = :id";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
	    $statement->bindParam(':id', $id);

		$statement->execute();
	}

	function updateUserToSubscriber($id){
		global $conn;

		$sql = "UPDATE users SET role = 'subscriber' WHERE id = :id";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
	    $statement->bindParam(':id', $id);

		$statement->execute();
	}

	function getUserById($id){
		global $conn;

		$sql= "SELECT * FROM users WHERE id = :id";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
	    $statement->bindParam(':id', $id);

		$statement->execute();

		$row = $statement->fetch();

		return $row;
	}
	


	/* MESSAGES */
	function getAllMessages(){
		global $conn;

		$sql = "SELECT m.id, m.subject, m.message, m.date, u.name, u.email FROM messages AS m INNER JOIN users AS u ON m.userId = u.Id";

		$statement = $conn -> prepare($sql);

		$statement->execute();

		$result = $statement->fetchAll();

		return $result;

	}

	/* DELETE MESSAGE */
	function deleteMessage($id){
		global $conn;

		$sql = "DELETE FROM messages WHERE id = :id";

		$statement = $conn -> prepare($sql);

		// bind parameters to values
	    $statement->bindParam(':id', $id);

		$statement->execute();
	}

 ?>