<?php
     include("../config.php");
     if(isset($_POST['classname']) && isset($_POST['subject'])){
          $classname = $_POST['classname'];
          $subject = $_POST['subject'];
          $user = $_SESSION['user'];
          $userid = $db->getUserID($user)['id'];
          if($db->createClass($classname,$subject)){
               if($db->createUserClass($userid , $db->LastID())){
                    echo 1;
               }else echo 0;
          }else echo 0;

     }
?>
