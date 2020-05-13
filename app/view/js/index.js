														/* Card flipping */
var card = document.querySelector(".card");
var playing = false;

card.addEventListener('click',function() {
	if(playing)
		return;
	
	playing = true;
	anime({
		targets: card,
		scale: [{value: 1}, {value: 1.4}, {value: 1, delay: 250}],
		rotateY: {value: '+=180', delay: 200},
		easing: 'easeInOutSine',
		duration: 600,
		complete: function(anim){
			 playing = false;
		}
	});
});

// CSS
var cardCSS = document.querySelector(".cardCSS");
var playing = false;

cardCSS.addEventListener('click',function() {
	if(playing)
		return;
	
	playing = true;
	anime({
		targets: cardCSS,
		scale: [{value: 1}, {value: 1.4}, {value: 1, delay: 250}],
		rotateY: {value: '+=180', delay: 200},
		easing: 'easeInOutSine',
		duration: 600,
		complete: function(anim){
			 playing = false;
		}
	});
});

// JS
var cardJS = document.querySelector(".cardJS");
var playing = false;

cardJS.addEventListener('click',function() {
	if(playing)
		return;
	
	playing = true;
	anime({
		targets: cardJS,
		scale: [{value: 1}, {value: 1.4}, {value: 1, delay: 250}],
		rotateY: {value: '+=180', delay: 200},
		easing: 'easeInOutSine',
		duration: 600,
		complete: function(anim){
			 playing = false;
		}
	});
});



											/* Redirect to quizzes */
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
	window.location.href = currentPathname + "/app/view/quizpage.php?subject=" + a + "&level=" + b;
}
