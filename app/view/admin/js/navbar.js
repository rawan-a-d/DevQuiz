// Active navbar
document.addEventListener("DOMContentLoaded", function() {
    // get current URL path and assign 'active' class
	var pathname = window.location.href;

	// Seperate path using the /
	var modifiedPathname = pathname.split("/");

	// Get the last item in array
	var currentPathname = modifiedPathname[modifiedPathname.length - 1];

	// Remove key value pair
	modifiedPathname = currentPathname.split("?");

	// Get only the file name
	currentPathname = modifiedPathname[0];

	var tabs = document.getElementsByTagName("a");
	
	for (var i = 0; i < tabs.length; i++) {
		// Give an active class to active tab
		if(tabs[i].getAttribute("href") == currentPathname){
			tabs[i].classList.add("active");
			console.log(tabs[i]);
		}
	}
});