// Active navbar
document.addEventListener("DOMContentLoaded", function() {
    // get current URL path and assign 'active' class
	var pathname = window.location.href;

	var modifiedPathname = pathname.split("/");

	var currentPathname = modifiedPathname[modifiedPathname.length - 1];

	var tabs = document.getElementsByTagName("a");
	
	for (var i = 0; i < tabs.length; i++) {
		if(tabs[i].getAttribute("href") == currentPathname){
			tabs[i].classList.add("active");
		}
	}
});