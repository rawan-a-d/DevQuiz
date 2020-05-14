<!-- Output buffering/ needed for redirecting users -->
<?php ob_start(); ?>

<?php 
  	$configPath = "../../model/config";
	/* Check session */
	include("$configPath/session.php");

	/* Session expiry */
	include("$configPath/session_expiry.php");

	/* Check if user is admin */
	include("includes/admin_session.php");

	/* Include classes */
	include_once("includes/autoload.inc.php");
?>


<!-- DB connection -->
<?php include_once("$configPath/db_connect.php"); ?>

	<?php 
	if (isset($_GET['qtype']))  
	{
		$type=$_GET['qtype'];
		$qnr=0;
	   // include_once("templates/connect.php");
		/*$getQ = $conn->prepare("SELECT * FROM questions WHERE subj='".$type."';");
		$getQ->execute();
		$questions = $getQ->fetchAll();*/
		$controller = new quizzController();
		$questions = $controller->getQuestionsBySubject($type);
		if (!isset($_SESSION['qnr']))
		{
			$_SESSION['qnr']=$questions[0]['id'];
		}
		$_SESSION['qnr']=$questions[$qnr]['id'];

		foreach ($questions as $question) {
		
		   
			if ($question['id']==$_SESSION['qnr'])
			{
				$q=$question['question'];
				$a1=$question['ans_a'];
				$a2=$question['ans_b'];
				$a3=$question['ans_c'];
				$a4=$question['ans_d'];
				$c=$question['answer'];
				$type=$question['subj'];
				$_SESSION['qtype']=$type;
			}
		}
	}
	if (!isset($_POST['save']))
	{
		if (!isset($_GET['type']))
		{
			//include_once("templates/connect.php");
			/*$getQ = $conn->prepare("SELECT * FROM questions;");
			$getQ->execute();
			$questions = $getQ->fetchAll();*/
			$controller = new quizzController();
			$questions = $controller->getAllQuestions();
			if (!isset($_SESSION['qnr']))
			{
				$_SESSION['qnr']=$questions[0]['id'];
			}
			foreach ($questions as $question) {
			
			   
				if ($question['id']==$_SESSION['qnr'])
				{
					$q=$question['question'];
					$a1=$question['ans_a'];
					$a2=$question['ans_b'];
					$a3=$question['ans_c'];
					$a4=$question['ans_d'];
					$c=$question['answer'];
					$type=$question['subj'];
					$_SESSION['qtype']=$type;
				}
			}
		}
		else
		{
			$type=$_GET['type'];
			$qnr=0;
			//include_once("templates/connect.php");
			/*$getQ = $conn->prepare("SELECT * FROM questions WHERE subj='".$type."';");
			$getQ->execute();
			$questions = $getQ->fetchAll();*/
			$controller = new quizzController();
			$questions = $controller->getQuestionsBySubject($type);
			if (!isset($_SESSION['qnr']))
			{
				$_SESSION['qnr']=$questions[0]['id'];
			}
			foreach ($questions as $question) {
				if ($_SESSION['qnr']==$question['id']) break;
				$qnr++;
			}
			if ($_GET['dir']==1 && $qnr) $qnr--;
			if ($_GET['dir']==2 && $qnr<count($questions)-1) $qnr++;
			$_SESSION['qnr']=$questions[$qnr]['id'];

			foreach ($questions as $question) {
			
			   
				if ($question['id']==$_SESSION['qnr'])
				{
					$q=$question['question'];
					$a1=$question['ans_a'];
					$a2=$question['ans_b'];
					$a3=$question['ans_c'];
					$a4=$question['ans_d'];
					$c=$question['answer'];
					$type=$question['subj'];
					$_SESSION['qtype']=$type;
				}
			}
		}
	}
	else
	{
		// include_once("templates/connect.php");
		/*$setQ = $conn->prepare("UPDATE questions SET question='".$_POST['question']."', ans_a='".$_POST['answer1']."', ans_b='".$_POST['answer2']."', ans_c='".$_POST['answer3']."', ans_d='".$_POST['answer4']."', answer='".$_POST['canswer']."' WHERE id='".$_SESSION['qnr']."';");
		$setQ->execute();*/
		$q=$_POST['question'];
		$a1=$_POST['answer1'];
		$a2=$_POST['answer2'];
		$a3=$_POST['answer3'];
		$a4=$_POST['answer4'];
		$c=$_POST['canswer'];
		$type=$_SESSION['qtype'];
		$controller = new quizzController();
		$controller->UpdateQuestionByID($q, $a1, $a2, $a3, $a4, $c, $type);
	}
	/*$gettype = $conn->prepare("SELECT * FROM subjects;");
	$gettype->execute();
	$typename = $gettype->fetchAll();*/
	$controller = new quizzController();
	$typename = $controller->getAllSubjects();
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Quizzes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/quizzes.css">

        <!-- Header -->
        <?php include 'includes/admin_header.php'; ?>

        <div id="wrapper">
            <h1 id="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>

			<div id="content">
				<div class="page-wrap">
					<form action="" method="POST">
						<h1>Modify a question</h1>
						<a href="quizzes.php?type=<?php echo $type;?>&dir=1" class="previous">&laquo; Previous</a>   
						<select id="qtype">
							<?php 
								foreach ($typename as $types) {
							?>
							<option value="<?php echo $types['id'];?>"<?php if ($types['id']==$type) echo "selected";?>><?php echo $types['name']?></option>
							<?php }?>
						</select>
						<a href="quizzes.php?type=<?php echo $type;?>&dir=2" class="next">Next &raquo;</a>
						<p><BR/><BR/></p>
						<textarea id="question" name = "question"><?php echo $q;?></textarea>
						<p><BR/><BR/></p>
						<textarea id="answer1" name = "answer1"><?php echo $a1;?></textarea>
						<textarea id="answer2" name = "answer2"><?php echo $a2;?></textarea>
						<textarea id="answer3" name = "answer3"><?php echo $a3;?></textarea>
						<textarea id="answer4" name = "answer4"><?php echo $a4;?></textarea>
						<p>Correct answer:</p>
						<select id="canswer" name = "canswer">
							<option value="a" <?php if ($c=='a') echo "selected";?>>A</option>
							<option value="b" <?php if ($c=='b') echo "selected";?>>B</option>
							<option value="c" <?php if ($c=='c') echo "selected";?>>C</option>
							<option value="d" <?php if ($c=='d') echo "selected";?>>D</option>
						</select>
						<p></p>
						<input type="submit" name="save" class="save" value="Save">
					</form>
				</div>
			</div>
		</div>

		<!-- JS -->
		<script type="text/javascript" src="js/quizzes.js"></script>
     <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>>