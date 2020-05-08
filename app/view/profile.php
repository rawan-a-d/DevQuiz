<?php
  $configPath = "../model/config";

  /* Check session */
  include("$configPath/session.php");

  /* Session expiry */
  include("$configPath/session_expiry.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/profile.css">

 	<!-- Include header -->
	<?php include('templates/header.php') ?>
<div id="content">
<div class="wrapper">
    <div class="left">
        <img src="IDPic.jpeg" 
        alt="user" width="100">
        <h4><?php echo $_SESSION["username"];?></h4>
         
    </div>
    <div class="right">
        <div class="info">
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p><?php echo $_SESSION["email"];?></p>
                 </div>
                 <div class="data">
                   <h4>Birthday</h4>
                    <!-- <p><?php echo $birthday;?></p> -->
              </div>
            </div>
        </div>
      
      <div class="bottom">
            <div class="bottom_data">
                 <div class="data">
                    <h4>University</h4>
                    <!-- <p><?php echo $university;?></p> -->
                 </div>
                 <div class="data">
                   <h4>Progamming languages</h4>
                    <!-- <p><?php echo $program;?>.</p> -->
              </div>
            </div>
        </div>
    </div>
</div>
</div>

	<!-- Include footer -->
	<?php include('templates/footer.php'); ?>
</body>
</html>