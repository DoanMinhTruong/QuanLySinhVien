<?php
     require("config.php");
     include("includes/header.php");
     if(!isset($_SESSION['user']))
          include("login.php");
     else {
          include("includes/dashboard.php");
     }
     include("includes/footer.php");
?>
