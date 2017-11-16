<?php

require_once 'php/helper-functions/dbconnect.php';
connectToDb("897163534aajf374");
if((!isset($_SESSION['userid']) || $_SESSION['userid'] == ""))
    header("Location: /landslide/login.php");

?>