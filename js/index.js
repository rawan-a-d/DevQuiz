function redirect( a, b){
	// get current URL path and assign 'active' class
	var pathname = window.location.href;

	// Split url
	var splitPath = pathname.split("/");

	// Remove last item
	splitPath.splice(splitPath.length - 1, 1);

	// Join the url again
	var currentPathname = splitPath.join("/");

	// Redirect
	window.location.href = currentPathname + "/QuizPage.php?subject="+a+"&level="+b;
}