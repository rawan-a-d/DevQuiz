// Active navbar
document.addEventListener("DOMContentLoaded", function() {
    // get current URL path and assign 'active' class
	var pathname = window.location.href;

	// Seperate path using the /
	var modifiedPathname = pathname.split("/");

	// Get the last item in array
	var currentPathname = modifiedPathname[modifiedPathname.length - 1];

	var tabs = document.getElementsByTagName("a");
	
	for (var i = 0; i < tabs.length; i++) {
		var tabPath = tabs[i].getAttribute("href");

		var modifiedname =  tabPath.split("/");

		tabPath = modifiedname[modifiedname.length - 1];

		// Give an active class to active tab
		// if tab is selected
		if(tabPath == currentPathname){
			tabs[i].classList.add("active");
			break;
		}
		// If home page is selected
		else if(currentPathname == "" || currentPathname == "index.php"){
			tabs[i].classList.add("active");
			break;
		}
	}
});