// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


// Defining a function to validate form 
function validateForm() {

	// Retrieving the values of form elements 
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var confirmPassword = document.getElementById("confirmPassword").value;
	// splitting name
	var nameArr = name.split(' ');
	var firstName = nameArr[0];
	var lastName = nameArr[1];

	// Defining error variables with a default value
	var nameErr = true;
	var emailErr = true;
	var passwordErr = true;
	var confirmPasswordErr = true;

	// Validate name
	if(name == "") {
		printError("nameErr", "Please enter your name");
	}
	else {
		var regex = /^[a-zA-Z\s]+$/;                
		if(regex.test(name) === false) {
			printError("nameErr", "Name can only contain charachters");
		} 
		else {
			printError("nameErr", "");
			nameErr = false;
		}
	}

	// Validate email address
	if(email == "") {
		printError("emailErr", "Please enter your email address");
	} 
	else {
		// Regular expression for basic email validation
		var regex = /^\S+@\S+\.\S+$/;
		if(regex.test(email) === false) {
			printError("emailErr", "Please enter a valid email address");
		} 
		else{
			printError("emailErr", "");
			emailErr = false;
		}
	}

	//Validate password
	if(password == "") {
		printError("passwordErr", "Please enter your password");
	}
	// If password contains first or last name or both
	else if(password.includes(firstName) || password.includes(lastName)){

		printError("passwordErr", "Password can't contain you name");
	}
	else {
		// To check a password between 7 to 15 characters which contain at least one numeric digit and a special character
		var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
		if(regex.test(password) === false) {
			printError("passwordErr", "Password must contain 7 to 15 characters, at least one number and one charachter");
		} else{
			printError("passwordErr", "");
			passwordErr = false;
		}
	}

    // Validate password
	if(confirmPassword == "") {
		printError("confirmPasswordErr", "Please enter your password");
	}
	// If password contains first or last name or both
	else if(confirmPassword.includes(firstName) || confirmPassword.includes(lastName)){
		printError("confirmPasswordErr", "Password can't contain you name");
	}
	else {
		// To check a password between 7 to 15 characters which contain at least one numeric digit and a special character
		var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
		if(regex.test(confirmPassword) === false) {
			printError("confirmPasswordErr", "Password must contain 7 to 15 characters, at least one number and one charachter");
		} else {
			printError("confirmPasswordErr", "");
			confirmPasswordErr = false;
		}
	}

	//Passwords match
	if(confirmPassword != password){
		printError("passwordErr", "");
		printError("confirmPasswordErr", "Passwords don't match");
	}

    // Prevent the form from being submitted if there are any errors
	if((nameErr || emailErr || passwordErr || confirmPasswordErr)) {
		return false;
	} 
	else {
		return true;
	}
};