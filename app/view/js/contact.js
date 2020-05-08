/* Defining a function to display error message */
function printError(elemId, hintMsg) {
	document.getElementById(elemId).innerHTML = hintMsg;
}

/* Defining a function to validate form  */
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


/* AJAX */
const form = document.getElementById("contact_form");
form.addEventListener("submit", function(event){
	event.preventDefault();
	// If form is filled in
	if(validateForm()){
		// Gather the form data
		const fd = new FormData(form);

		// Create an XML HTTP Request
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			 console.log(this.readyState);

			if (this.readyState == 4 && this.status == 200) {
				console.log("READY");

				// Display confirmation
				setTimeout(function(){
					var submitButton = document.querySelector(".button");
					var buttonId = submitButton.id;
					var modalContainer = document.querySelector("#modal-container");
					var body = document.querySelector("body");

					modalContainer.removeAttribute("class");
					modalContainer.classList.add(buttonId);
					body.classList.add("modal-active");
				},500);

				// Empty form fields
				var subject = document.getElementById("subject");
				var message = document.getElementById("message");

				subject.value = "";
				message.value = "";
			}
		};

		xhr.open("POST", form.action);

		// Send request
		xhr.send(fd);
	}

});


/* Succes message */
var modalContainer = document.querySelector("#modal-container");

modalContainer.addEventListener("click", function(){
	this.classList.add("out");
	var body = document.querySelector("body");

	body.classList.remove("modal-active");
})