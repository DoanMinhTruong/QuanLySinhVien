<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">     <link rel="stylesheet" href="index.css">
     <!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <title>Quản Lý Sinh Viên</title>
</head>
<body>
     <div class="header">
          <div class="navbar navbar-expand-md navbar-dark bg-dark text-white">
               <div class="container">
                    <a href="index.php" class="navbar-brand">Quản Lý Sinh Viên</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes" aria-controls="navbarRes">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarRes">
                         <ul class="navbar-nav auto">
                              <!-- <li class="nav-item active">
                                   <a class="nav-link" href="#">Home
                                        <span class="sr-only">(current)</span>
                                   </a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#">Services</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#">Contact</a>
                              </li> -->
                         </ul>
                                   <?php 
                                   if(isset($_SESSION['user'])) 
                                        echo '<div class="log ml-auto">
                                             <span id="user-account" class="h5 pr-3">'.$_SESSION['user'].'</span>
                                             <a href="logout.php">Logout</a>
                                   </div>';
                                    ?>
                    </div>
               </div>
          </div>
     </div>
