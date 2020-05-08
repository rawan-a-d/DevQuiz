<!-- Output buffering/ needed for redirecting users -->
<?php ob_start(); ?>

<?php 
	/* Check session */
	include('../config/session.php');

	/* Session expiry */
	include('../config/session_expiry.php');
?>

<!-- DB connection -->
<?php include('../config/db_connect.php'); ?>
<!-- Functions -->
<?php include('includes/functions.php'); ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Messages</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" type="text/css" href="css/users_messages.css">

		<!-- Header -->
		<?php include 'includes/admin_header.php'; ?>
		
		<div id="wrapper">
			<h1 id="page-header">
				Welcome to admin
				<small>Author</small>
			</h1>

			<!-- Including Pages based on condition technique -->
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<!-- GET ALL USERS -->
					<?php 
						$result = getAllMessages();

						// Fetch result
						foreach ($result as $row) {
							$id = $row['id'];
							$name = $row['name'];
							$email = $row['email'];
							$subject = $row['subject'];
							$message = $row['message'];
							$date = $row['date'];

							?>

							<tr>
								<td><?php echo $id ?></td>
								<td><?php echo $name ?></td>
								<td><?php echo $email ?></td>
								<td><?php echo $subject ?></td>
								<td><?php echo $message ?></td>
								<td><?php echo $date ?></td>
					   
								<td><a href='messages.php?delete=<?php echo $id ?>'>Delete</a></td>
							</tr>


						<?php } ?>


						<!-- DELETE USER -->
						<?php 
							if(isset($_GET['delete'])){
								$message_id = $_GET['delete'];

								deleteMessage($message_id);

							   header("Location: messages.php");
							}
						 ?>

				</tbody>
			</table>
		</div>
    <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>