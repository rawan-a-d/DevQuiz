<?php 
	/* Check session */
	include('config/session.php');

	/* Session expiry */
	include('config/session_expiry.php');

	/* Contact us */
	include('mysql/functions.php');

	$subject = $message = "";

	// If post request was sent
	if(isset($_POST['submit'])){
		$subject = $_POST['subject'];
		$message = $_POST['message'];

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

		<!-- Main -->
		<main id="main">
			<form method="POST" action="contact.php" onsubmit="return validateForm()">
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
				<textarea id="message" type="text" rows="14" name="message"></textarea>
				<!-- Display errors -->
				<div class="error" id="messageErr">
				</div>
				<!-- Submit button -->
				<button id="submit" type="submit" name="submit">
					Send
				</button>
			</form>
		</main>

		<!-- Include footer -->
		<?php include('templates/footer.php') ?>
		<!-- JS -->
		<script type="text/javascript" src="js/contact.js"></script>
	</body>
</html>