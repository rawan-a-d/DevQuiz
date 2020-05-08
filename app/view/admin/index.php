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