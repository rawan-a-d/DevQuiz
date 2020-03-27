<?php
  session_start();
  include_once("templates/connect.php");
  $getUsers = $db->prepare("SELECT * FROM users WHERE id='".$_SESSION['userid']."';");
	$getUsers->execute();
  $users = $getUsers->fetchAll();
  foreach ($users as $user) {
			
    // user id
    if ($user['id']==$_SESSION['userid'])
    {
      $name=$user['name'];
      $email=$user['email'];
      //$nrq=$nrq['nrq'];
      $university=$user['university'];
      $birthday=$user['birthday'];
      $program=$user['program'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/aboutus.css">
	<!-- Include header -->
	<?php include('templates/header.php') ?>

<div class="wrapper">
    <div class="left">
        <img src="IDPic.jpeg" 
        alt="user" width="100">
        <h4><?php echo $name;?></h4>
         
    </div>
    <div class="right">
        <div class="info">
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p><?php echo $email;?></p>
                 </div>
                 <div class="data">
                   <h4>Birthday</h4>
                    <p><?php echo $birthday;?></p>
              </div>
            </div>
        </div>
      
      <div class="bottom">
            <div class="bottom_data">
                 <div class="data">
                    <h4>University</h4>
                    <p><?php echo $university;?></p>
                 </div>
                 <div class="data">
                   <h4>Progamming languages</h4>
                    <p><?php echo $program;?>.</p>
              </div>
            </div>
        </div>
    </div>
</div>

	<!-- Include footer -->
	<?php include('templates/footer.php'); ?>
</html>