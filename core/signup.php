<?php
     include("../config.php");
     if(isset($_POST['username']) && isset($_POST['password'])){
          $user= $_POST['username'];
          $pass = $_POST['password'];
          $check = $db->signUpUser($user, $pass);
          if($check) echo 1;
          else echo 0;
     }
?>
