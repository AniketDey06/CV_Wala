<?php
    session_start();
    //1.Destroy the session
    session_destroy();
    //2.Redirect to login page
    header('location: login.php');
?>