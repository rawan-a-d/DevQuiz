<!-- Output buffering/ needed for redirecting users -->
<?php ob_start(); ?>

<?php 
	/* Paths */
  	$configPath = "../../model/config";
	/* Check session */
	include("$configPath/session.php");

	/* Session expiry */
	include("$configPath/session_expiry.php");

	/* Check if user is admin */
	include("includes/admin_session.php");

?>

<!-- Include classes -->
<?php include_once 'includes/autoload.inc.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Messages</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/messages.css">

		<!-- Header -->
		<?php include 'includes/admin_header.php'; ?>
		
		<div id="wrapper">
			<h1 id="page-header">
				Welcome to admin
			</h1>
			<!-- Table -->
			<table class="table table-bordered table-hover">
				<thead>
					<!-- Columns -->
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
					<!-- GET ALL MESSAGES -->
					<?php 
			            $msgController = new MessageController();
			            
			           $result = $msgController->getAllMessages();
						// Fetch result
						foreach ($result as $row) {
							$id = $row['id'];
							$name = $row['name'];
							$email = $row['email'];
							$subject = $row['subject'];
							$message = $row['message'];
							//$date = $row['date'];
							$date = $row['created_at'];

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


						<!-- Delete message -->
						<?php 
							if(isset($_GET['delete'])){
								$message_id = $_GET['delete'];

								$controller = new MessageController();
                    			$controller->deleteMessage($message_id);
							}
						 ?>

				</tbody>
			</table>
		</div>
    <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>