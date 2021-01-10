<?php    
     include("../config.php");
     if(isset($_POST['username']) && isset($_POST['password']))
     {
          $user = $_POST['username'];
          $pass = $_POST['password'];
          $data = $db->fetchAll("user");
          foreach($data as $d){
               if($d['username'] == $user && $d['password'] == $pass){
                    $_SESSION['user'] = $user;
                    echo 1;
                    return;
               }
          }
          echo 0;
     }
?>

