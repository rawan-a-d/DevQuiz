<?php  ?>

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
			<form method="" target="">
				<!-- Name -->
				<input class="credentials" type="text" name="name" placeholder="Name">
				<!-- Email -->
				<input class="credentials" type="email" name="email" placeholder="E-mail address">
				<!-- Subject -->
				<select id="subject">
					<option value="subject">Select a subject</option>
					<option value="quiz">Quiz</option>
					<option value="Score">Score</option>
					<option value="other">Other</option>
				</select>
				<!-- Message -->
				<textarea id="message" type="text" rows="10"></textarea>
				<!-- Submit button -->
				<button id="submit" type="submit">
					Send
				</button>
			</form>
		</main>

		<!-- Include footer -->
		<?php include('templates/footer.php') ?>
	</body>
</html>