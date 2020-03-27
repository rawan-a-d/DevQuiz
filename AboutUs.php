<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Our Team</title>
  <link rel="stylesheet" type="text/css" href="css/aboutus.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<!-- Include header -->
<?php include('templates/header.php') ?>


  <div class="wrapper">
    <h1>Our Team</h1>
    <div class="team">
      <div class="team_member">
        <div class="team_img">
          <img src="IDPic.jpeg" alt="Team_image">
        </div>
        <h3>Rares Balutoiu</h3>
        <p class="smallinfo">Software Engineering Student at Fontys University of Applied Sciences</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
      </div>
      <div class="team_member">
        <div class="team_img">
          <img src="Rawan.jpeg" alt="Team_image">
        </div>
        <h3>Rawan Abou Dehn</h3>
        <p class="smallinfo">Software Engineering Student at Fontys University of Applied Sciences</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p></div>
    </div>
  </div>	
  	<!-- Include footer -->
		<?php include('templates/footer.php') ?>
	</body>
</html>