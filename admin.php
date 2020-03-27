<?php
   /* Check session */
      include('config/session.php');

      /* Session expiry */
      include('config/session_expiry.php');
          // DB connection
     include('config/db_connect.php');
    if (isset($_GET['qtype']))  
    {
        $type=$_GET['qtype'];
        $qnr=0;
       // include_once("templates/connect.php");
        $getQ = $conn->prepare("SELECT * FROM questions WHERE subj='".$type."';");
        $getQ->execute();
        $questions = $getQ->fetchAll();
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
		    $getQ = $conn->prepare("SELECT * FROM questions;");
		    $getQ->execute();
		    $questions = $getQ->fetchAll();
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
            $getQ = $conn->prepare("SELECT * FROM questions WHERE subj='".$type."';");
		    $getQ->execute();
		    $questions = $getQ->fetchAll();
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
		$setQ = $conn->prepare("UPDATE questions SET question='".$_POST['question']."', ans_a='".$_POST['answer1']."', ans_b='".$_POST['answer2']."', ans_c='".$_POST['answer3']."', ans_d='".$_POST['answer4']."', answer='".$_POST['canswer']."' WHERE id='".$_SESSION['qnr']."';");
        $setQ->execute();
        $q=$_POST['question'];
        $a1=$_POST['answer1'];
        $a2=$_POST['answer2'];
        $a3=$_POST['answer3'];
        $a4=$_POST['answer4'];
        $c=$_POST['canswer'];
        $type=$_SESSION['qtype'];
    }
    $gettype = $conn->prepare("SELECT * FROM subjects;");
	$gettype->execute();
    $typename = $gettype->fetchAll();
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Admin Page</title>
    <script>
        function changetype()
        {
            window.location.href="admin.php?qtype="+document.getElementById("qtype").value;
        }
    </script>
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/aboutus.css">
	<!-- Include header -->
    <?php include('templates/header.php') ?>
    
    <div class="page-wrap">

    <form action="admin.php" method="POST">
        <h1>Modify a question</h1>
        <a href="admin.php?type=<?php echo $type;?>&dir=1" class="previous">&laquo; Previous</a>   
        <select id="qtype" onchange="changetype();">
            <?php 
                foreach ($typename as $types) {
            ?>
            <option value="<?php echo $types['id'];?>"<?php if ($types['id']==$type) echo "selected";?>><?php echo $types['name']?></option>
            <?php }?>
        </select>
        <a href="admin.php?type=<?php echo $type;?>&dir=2" class="next">Next &raquo;</a>
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
        <p><BR/></p>
        <input type="submit" name="save" class="save" value="Save">
    </form>
    </div>

	<!-- Include footer -->
	<?php include('templates/footer.php'); ?>
</html>