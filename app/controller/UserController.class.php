<?php 

/* Responsible for handling the users and contacting the UserManager */
class UserController extends UserManager {
	// Stores the UserManager object
	public $model;

	public function __construct()  
	{  
		$this->model = new UserManager();
	} 

	/* Get user by id */
	public function getUser($id) {
		return $this->model->getUser($id);
	}

	/* Add new user */
	public function addUser($name, $email, $university, $birthday, $program, $role, $password) {
		$this->model->addUser($name, $email, $university, $birthday, $program, $role, $password);

		header('Location: ../admin/users.php');
	}

	/* Delete user by id */
	public function deleteUser($id){
		$this->model->deleteUser($id);

		header('Location: ../admin/users.php');
	}

	/* Update user */
	public function updateUser($name, $email, $university, $birthday, $program, $role, $id){
		$this->model->updateUser($name, $email, $university, $birthday, $program, $role, $id);
	}

	/* Get all users */
	public function getAllUsers(){
		//return parent::getAllUsers();
		// OR
		$this->model->getAllUsers();
	}

	/* Update user to admin */
	public function updateUserToAdmin($id){
		$this->model->updateUserToAdmin($id);

		header('Location: ../admin/users.php');

	}

	/* Update user to subscriber */
	public function updateUserToSubscriber($id){
		$this->model->updateUserToSubscriber($id);

		header('Location: ../admin/users.php');
	}

	/* Sign up */
	public function signUp($name, $email, $role, $password) {
		$this->model->signUp($name, $email, $role, $password);

		// Start user session
		session_start();

		// Save user name
		$_SESSION['username'] = $name;		

		header('Location: ../../index.php');
	}

	/* Login */
	public function login($email, $password) {
		$result = $this->model->login($email, $password);	

		// If user doesn't exist
		if($result == null){
			return false;
		}
		else {
			// Start user session
			session_start();

			// Check user role (Admin or user)
			if($result["role"] == "admin"){
				$_SESSION["admin"] = 1;
			}

			// Save userId and name and email
			$_SESSION["userId"] = $result['id'];
			$_SESSION["username"] = $result['name'];
			$_SESSION["email"] = $result['email'];

			// Used in remember me
			$_SESSION['loggedin_time'] = time();

			//Check remember me
			if(!isset($_POST['remember_me'])){
				$remember_me = $_POST['remember_me'];
				$_SESSION['remember_me'] = $remember_me;
			}

			// If user has a session
			if(isset($_SESSION["userId"])){
				header('Location: ../../index.php');
			}

			return true;
		}
	}

	/* Check if user exists */
	public function emailExists($email){
		$this->model->emailExists($email);
	}
	

	/* Run this method when the user page is open */
	public function invoke()
	{
		// If key source is set
		if (isset($_GET['source'])) {
			$source = $_GET['source'];
		} 
		else {
			$source = '';
		}

		/* Display page based on the source */
		switch ($source) {
			case 'add_user':
				include "includes/add_user.php";
				break;
			case 'edit_user':
				include "includes/edit_user.php";
				break;
			default:
				$results =  $this->model->getAllUsers();
				include "includes/view_all_users.php";
				break;
		}
	}
}	


 ?>