// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
	// Retrieving the values of form elements 
	var subject = document.getElementById("subject").value;
	var message = document.getElementById("message").value;

	// Defining error variables with a default value
	var subjectErr = true;
	var messageErr = true;

	// Validate email address
	if(subject == "") {
		printError("subjectErr", "Please enter the subject");
	} 
	else if(subject == "subject"){
		printError("subjectErr", "Subject is not valid");
	}
	else {
		printError("subjectErr", "");
		subjectErr = false;
	}

	//Validate password
	if(message == "") {
		printError("messageErr", "Please enter your message");
	} 
	else {
		printError("messageErr", "");
		messageErr = false;
	}

    // Prevent the form from being submitted if there are any errors
	if(subjectErr || messageErr) {
		console.log('errors');
		return false;
	} 
	else {
		console.log('no errors');
		return true;
	}
};