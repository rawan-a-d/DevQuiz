function verify(){
  var ans;
  var x = document.getElementsByName ("question-1-answers");
  for (var i=0;i<x.length;i++)
  if (x[i].checked) ans = x[i].value;
  if (ans=='<?php echo $q['answer'];?>') var ok=1;
  else var ok=0;

    // get current URL path and assign 'active' class
    var pathname = window.location.href;

    // Split url
    var splitPath = pathname.split("/");

    // Remove last item
    splitPath.splice(splitPath.length - 1, 1);

    // Join the url again
    var currentPathname = splitPath.join("/");

    // Redirect
    window.location.href = currentPathname + "/QuizPage.php?subject=<?php echo $subject;?>&level=<?php echo $level;?>&c="+ok;
}