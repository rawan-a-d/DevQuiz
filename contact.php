<?php 
	/* Check session */
	include('config/session.php');

	/* Session expiry */
	include('config/session_expiry.php');

	/* Contact us */
	include('mysql/functions.php');

	$subject = $message = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$subject = htmlspecialchars(trim($_POST["subject"]));
		$message = htmlspecialchars(trim($_POST["message"]));

		contact($subject, $message);
   }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contact us</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" type="text/css" href="css/contact.css">

	<!-- Include header -->
	<?php include('templates/header.php') ?>
	
		<div id="content">
			<!-- Main -->
			<main id="main">
				<form method="POST" action="contact.php" id="contact_form">
					<label for="subject">Subject</label>
					<select id="subject" name="subject">
						<option value="subject">Select a subject</option>
						<option value="Quiz">Quiz</option>
						<option value="Score">Score</option>
						<option value="Other">Other</option>
					</select>
					<!-- Display errors -->
					<div class="error" id="subjectErr">
					</div>
					<!-- Message -->
					<label for="message">Your message</label>
					<textarea id="message" type="text" rows="14" name="message"></textarea>
					<!-- Display errors -->
					<div class="error" id="messageErr">
					</div>
					<!-- Submit button -->
					<button type="submit" name="submit" id="five" class="button">
						Send
					</button>
				</form>
			</main>
			<div id="modal-container">
				<div class="modal-background">
					<div class="modal">
					  <h2>Thanks for your message</h2>
					  <p>We'll get back to you as soon as possible!</p>
						<svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
							<rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
						</svg>
					</div>
				</div>
			</div>
		</div>

		<!-- Include footer -->
		<?php include('templates/footer.php') ?>
		<!-- JS -->
		<script type="text/javascript" src="js/contact.js"></script>
	</body>
</html>