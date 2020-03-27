<?php
	/* Check session */
	include('config/session.php');

	/* Session expiry */
	include('config/session_expiry.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Our Team</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" type="text/css" href="css/aboutus.css">

	<!-- Include header (links to css files and navbar) -->
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
						<img src="img/rawan.jpg" alt="Team_image">
					</div>
					<h3>Rawan Abou Dehn</h3>
					<p class="smallinfo">Software Engineering Student at Fontys University of Applied Sciences</p>
					<p>I am originally from Syria and I have been living in the Netherlands for 5 years.</p>
				</div>
			</div>
		</div>	
		<!-- Include footer -->
		<?php include('templates/footer.php') ?>
	</body>
</html>