<?php
    //create constants to store Non Repeating Values
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','cvwala');

    //Database Connection
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());
    

   if(!$conn)
   {
    die('Connection Failed'.mysqli_connect_error());
   } 


   date_default_timezone_set("Asia/Kolkata");

?>