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

	// splitting name
	var nameArr = name.split(' ');
	var firstName = nameArr[0];
	var lastName = nameArr[1];

	// Defining error variables with a default value
	var nameErr = true;
	var emailErr = true;
	var passwordErr = true;

	// Validate name
	if(name == "") {
		printError("nameErr", "Name can't be empty");
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
		printError("emailErr", "Email can't be empty");
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
		printError("passwordErr", "Password can't be empty");
	}
	// If password contains first or last name or both
	else if(password.includes(firstName) || password.includes(lastName)){

		printError("passwordErr", "Password can't contain your name");
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

    // Prevent the form from being submitted if there are any errors
	if((nameErr || emailErr || passwordErr)) {
		console.log("error")
		return false;
	} 
	else {
		return true;
	}
};
