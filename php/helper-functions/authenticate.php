<?php

if(!isset($_SESSION['userid']) || $_SESSION['userid'] == "")
    header("Location: /landslide/login.php");

?>