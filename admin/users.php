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
        <title>Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" type="text/css" href="css/users_messages.css">
        <?php 
            if(isset($_GET['source'])){
                ?>
                <link rel="stylesheet" type="text/css" href="css/edit_user.css">
            <?php }
         ?>

        <!-- Header -->
        <?php include 'includes/admin_header.php'; ?>

        <div id="wrapper">
            <h1 id="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>

            <!-- Including Pages based on condition technique -->
            <?php 
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } 
                else {
                    $source = '';
                }

                switch ($source) {
                    case 'add_user':
                        include "includes/add_user.php";
                        break;
                    case 'edit_user':
                        include "includes/edit_user.php";
                        break;
                    default:
                        include "includes/view_all_users.php";
                        break;
                }
             ?>
        </div>
     <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>