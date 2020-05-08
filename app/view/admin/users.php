<!-- Output buffering/ needed for redirecting users -->
<?php ob_start(); ?>

<?php 
    /* Paths */
    $configPath = "../../model/config";
    /* Check session */
    include_once("$configPath/session.php");

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
        <title>Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/users_messages.css">
        <!-- Include edit_user CSS file if it's the edit user page -->
        <?php 
            if(isset($_GET['source']) & !empty($_GET['source'])){
                ?>
                <link rel="stylesheet" type="text/css" href="css/edit_user.css">
            <?php }
         ?>

        <!-- Header -->
        <?php include 'includes/admin_header.php'; ?>

        <div id="wrapper">
            <h1 id="page-header">
                Welcome to admin
            </h1>

            <!-- Including Pages based on condition technique -->
            <?php 
                $controller = new UserController();
                $controller->invoke();
             ?>
        </div>
     <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>