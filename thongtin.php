<?php 
include("config.php");
include("includes/header.php");
if(!isset($_SESSION['user'])) include("login.php"); 
else{
     echo '<div class="user-control">
               <div class="row">
                    <div class="col-sm-2">
                         ';
     include("includes/navbar.php");
     
     echo  '</div>
               <div class="col-sm-10">
                    <div class="row">
          ';
          $info = $db->getUserID($_SESSION['user']);
          echo $info['username'];
     echo '               ...bla bla...</div>
               </div>
          </div>
     </div>
     ';
}
?>
