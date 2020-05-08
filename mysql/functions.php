<?php 
	// DB connection
	include('config/db_connect.php');

	/* LOGIN */
	function login($email, $password){
		global $conn;

		try{
			// Encrypt password
			$hashFormat = "$2y$10$";

			$salt = "iusesomecrazystrings22";

			$hash_and_salt = $hashFormat . $salt;

			$password = crypt($password, $hash_and_salt);

			// Create sql
			$sql = "SELECT * FROM users WHERE email= :email AND password = :password ";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':email', $email);
		    $statement->bindParam(':password', $password);

			$statement->execute();

			$result = $statement->fetch();

			// Close DB connection
			$conn = null;
			// If user doesn't exist
			if(!$result){
				return false;
			}
			else {
				// Start user session
				session_start();

				// Check user role (Admin or user)
				if($result["isAdmin"] == 1){
					$_SESSION["admin"] = 1;
				}

				// Save userId and name
				$_SESSION["userId"] = $result['id'];
				$_SESSION["username"] = $result['name'];
				$_SESSION["email"] = $result['email'];

				// Used in remember me
				$_SESSION['loggedin_time'] = time();

				//Check remember me, ***** if it's set******
				if(!isset($_POST['remember_me'])){
					$remember_me = $_POST['remember_me'];
					$_SESSION['remember_me'] = $remember_me;
				}

				// If user has a session
				if(isset($_SESSION["userId"])){
					header('Location: index.php');
				}

				return true;
			}

		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}

	} // END LOGIN



	/* SIGNUP */
	function signup($name, $email, $password){
		global $conn;
		
		// Encrypt passwords
		$hashFormat = "$2y$10$";

		$salt = "iusesomecrazystrings22";

		$hash_and_salt = $hashFormat . $salt;

		$password = crypt($password, $hash_and_salt);

		try {
			// Create sql query
			$sql = "INSERT INTO users (name, email, password, isAdmin) ";
			$sql .= "VALUES (:name, :email, :password, -1)";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
			$statement->bindParam(':email', $email);
			$statement->bindParam(':password', $password);
			$statement->bindParam(':name', $name);

			$statement->execute();

			$result = $statement->fetch();

			// Start user session
			session_start();

			// Save user name
			$_SESSION['username'] = $name;

			// Close DB connection
			$conn = null;

			// Start user session
			header('Location: index.php');

		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	} // End signup
	


	/* Email already exists, used in signup */
	function emailExists($email){	
		global $conn;

		try {

			// Create sql
			$sql = "SELECT id FROM users WHERE email= :email";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':email', $email);

			$statement->execute();

			$user = $statement->fetch();	

			// Close DB connection
			$conn = null;
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


	// Contact us
	function contact($subject, $message){
		global $conn;

		$subject = $subject;
		$message = $message;

		// Get user id
		$userId = $_SESSION['userId'];

		try {
			// Create sql query
			$sql = "INSERT INTO messages (subject, message, userId, date) ";
			$sql .= "VALUES (:subject, :message, :userId, now())";

			$statement = $conn -> prepare($sql);

			// bind parameters to values
			$statement->bindParam(':subject', $subject);
			$statement->bindParam(':message', $message);
			$statement->bindParam(':userId', $userId);

			$statement->execute();

			$result = $statement->fetch();

			// Close DB connection
			$conn = null;
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}
?>