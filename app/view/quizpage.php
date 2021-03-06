<?php
  $configPath = "../model/config";

    /* Check session */
  include("$configPath/session.php");

  /* Session expiry */
  include("$configPath/session_expiry.php");

  /* Include classes */
  include_once("../../includes/autoload.inc.php");
  

    $ok=1;$havequestions=1;
    if (isset($_GET['subject'])) $subject=$_GET['subject'];
    else $ok=0;
    if (isset($_GET['level'])) $level=$_GET['level'];
    else $ok=0;
    if ($ok){
      $controller = new quizzController();
      $questions=$controller->getQuestionsBySubjectLevel($subject, $level);
      $nrq=$controller->getCountBySubjectLevel($subject, $level);  
      if (!$nrq) $havequestions=0;

      if (!isset($_SESSION['currentq']))
      {
          $_SESSION['currentq']=0;
          $_SESSION['correctans']=0;
      }
      else $_SESSION['currentq']=$_SESSION['currentq']+1;
      //echo $_SESSION['currentq'];
      if (isset($_GET['c']))
      {
        if ($_GET['c']) $_SESSION['correctans']++;
      }
      
      
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dev Quiz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="css/quizpage.css">

   
	<!-- Include header -->
  <?php include('templates/header.php');
  if ($_SESSION['currentq']<$nrq){
    $q=$questions[$_SESSION['currentq']];?>

<script>
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
          window.location.href = currentPathname + "/quizpage.php?subject=<?php echo $subject;?>&level=<?php echo $level;?>&c="+ok;
      }
    </script>

  <div id="content">

  <header  id="website_purpose">
      <h1 class="testname">
        <?php 
          $controller = new quizzController();
          echo $controller->getSubjectBYID($subject);
        ?>
      </h1>
  </header>
	
  <div class="page-wrap">

   <h1>&nbsp;</h1>
    
        <ol style="list-style-type:none;";>
        
            <li>
            
                <h3><?php echo $_SESSION['currentq']+1;echo ".  ";echo htmlspecialchars($q['question']);echo " ?";?></h3>
                
                <h2>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="a" />
                    <label for="question-1-answers-A"><?php echo htmlspecialchars($q['ans_a']);?> </label>
                </h2>
                
                <h4>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="b" />
                    <label for="question-1-answers-B"><?php echo htmlspecialchars($q['ans_b']);?></label>
                </h4>
                
                <h5>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="c" />
                    <label for="question-1-answers-C"><?php echo htmlspecialchars( $q['ans_c']);?></label>
                </h5>
                
                <h6>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="d" />
                    <label for="question-1-answers-D"><?php echo htmlspecialchars( $q['ans_d']);?></label>
                </h6>
            
            </li>
            
        </ol>
        
        <input class="submitbutton" type="submit" value="Submit Question" onclick="verify();"/>

        <?php
        }
        else {
          if ($havequestions)
          {
            ?>
            <!--html code here-->
            <div id="content">
            <div class="page-wrap">
            <h3>You answered correctly:</h3>
            <h3><?php echo $_SESSION['correctans'];?>  /  <?php echo $nrq;?></h3>
            </div>
          </div>
          <?php
            $_SESSION['currentq']=-1;
            $_SESSION['correctans']=0;
            //unset($nrq);
            //unset($ok);
            //unset($q);
            //unset($questions);
            //unset($_SESSION['currentq']);
            //unset($_SESSION['correctans']);
          }
          else 
          {
            ?>
            <!--html code here-->
            <div id="content">
            <div class="page-wrap">
            <h3>This section</h3>
            <h3>Has no questions yet!</h3>
            </div>
          </div>
          <?php
          }
        }?>
    
</div>
</div>

	<!-- Include footer -->
	<?php include('templates/footer.php'); }?>
  </body>
</html>