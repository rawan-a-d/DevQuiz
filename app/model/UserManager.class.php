<?php 

// For database interaction with users table
class UserManager extends Dbh {
	// Get user by id
    protected function getUser($id) {
    	try {
	        $sql= "SELECT * FROM users WHERE id = :id";

	        $statement = $this->connect()->prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':id', $id);

			$statement->execute();

			$row = $statement->fetch();

			return $row;
    	}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
    }

    // Add new user
    protected function addUser($name, $email, $university, $birthday, $program, $role, $password) {
    	try {
			// Encrypt password
			$hashFormat = "$2y$10$";

			$salt = "iusesomecrazystrings22";

			$hash_and_salt = $hashFormat . $salt;

			$password = crypt($password, $hash_and_salt);

			$query = "INSERT INTO users(name, email, university, birthday, program, role, password) ";
			$query .= "VALUES(:name, :email, :university, :birthday, :program, :role, :password) ";

			$stmt = $this->connect()->prepare($query);

			// bind parameters to values
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':email', $email);
		    $stmt->bindParam(':university', $university);
		    $stmt->bindParam(':birthday', $birthday);
		    $stmt->bindParam(':program', $program);
		    $stmt->bindParam(':role', $role);
		    $stmt->bindParam(':password', $password);

			$stmt->execute();
    	}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}

    }

	/* Delete user by id */
	protected function deleteUser($id){
		try {
			$sql = "DELETE FROM users WHERE id = :id";

			$stmt = $this->connect()->prepare($sql);

			// bind parameters to values
		    $stmt->bindParam(':id', $id);

			$stmt->execute();
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Update user */
	protected function updateUser($name, $email, $university, $birthday, $program, $role, $id){
		try {
			$query = "UPDATE users SET ";
			$query .= "name = :name, ";
			$query .= "email = :email, ";
			$query .= "role = :role, ";
			$query .= "university = :university, ";
			$query .= "birthday = :birthday, ";
			$query .= "program = :program ";
			$query .= "WHERE id = :id";

			$stmt = $this->connect()->prepare($query);

			// bind parameters to values
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':email', $email);
		    $stmt->bindParam(':university', $university);
		    $stmt->bindParam(':birthday', $birthday);
		    $stmt->bindParam(':program', $program);
		    $stmt->bindParam(':role', $role);
		    $stmt->bindParam(':id', $id);

			$stmt->execute();
    	}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Get all users */
	protected function getAllUsers(){
		try {
			$sql = "SELECT * FROM users";

			$stmt = $this->connect()->prepare($sql);

			$stmt->execute();

			$result = $stmt->fetchAll();

			return $result;
    	}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Update user to admin */
	protected function updateUserToAdmin($id){
		try {
			$sql = "UPDATE users SET role = 'admin' WHERE id = :id";

			$stmt = $this->connect()->prepare($sql);

			// bind parameters to values
		    $stmt->bindParam(':id', $id);

			$stmt->execute();
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Update user to subscriber */
	protected function updateUserToSubscriber($id){
		try {
			$sql = "UPDATE users SET role = 'subscriber' WHERE id = :id";

			$stmt = $this->connect()->prepare($sql);

			// bind parameters to values
		    $stmt->bindParam(':id', $id);

			$stmt->execute();
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}

	}


	/* Sign up */
    public function signUp($name, $email, $role, $password) {
    	try {
			// Encrypt password
			$hashFormat = "$2y$10$";

			$salt = "iusesomecrazystrings22";

			$hash_and_salt = $hashFormat . $salt;

			$password = crypt($password, $hash_and_salt);

			$query = "INSERT INTO users(name, email, role, password) ";
			$query .= "VALUES(:name, :email, :role, :password) ";

			$stmt = $this->connect()->prepare($query);

			// bind parameters to values
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':email', $email);
		    $stmt->bindParam(':role', $role);
		    $stmt->bindParam(':password', $password);

			$stmt->execute();
    	}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Login */
	protected function login($email, $password) {
		try{
			// Encrypt password
			$hashFormat = "$2y$10$";

			$salt = "iusesomecrazystrings22";

			$hash_and_salt = $hashFormat . $salt;

			$password = crypt($password, $hash_and_salt);

			// Create sql
			$sql = "SELECT * FROM users WHERE email= :email AND password = :password ";

			$statement = $this->connect()->prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':email', $email);
		    $statement->bindParam(':password', $password);

			$statement->execute();

			$result = $statement->fetch();

			return $result;
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}	

	/* Check if user exists */
	protected function emailExists($email){
		try {

			// Create sql
			$sql = "SELECT id FROM users WHERE email= :email";

			$statement = $this->connect()->prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':email', $email);

			$statement->execute();

			$user = $statement->fetch();	

			if($user){
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

}	


 ?>