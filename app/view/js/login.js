
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
	// Retrieving the values of form elements 
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;

	// Defining error variables with a default value
	var emailErr = true;
	var passwordErr = true;

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
	else {
		printError("passwordErr", "");
		passwordErr = false;
	}

    // Prevent the form from being submitted if there are any errors
	if(emailErr || passwordErr) {
		console.log('errors');
		return false;
	} 
	else {
		console.log('no errors');
		return true;
	}
};