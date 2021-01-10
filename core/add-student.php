<?php
     include("../config.php");
     if(isset($_POST['user']) && isset($_POST['birth']) && isset($_POST['gender']) && isset($_POST['class_id'])){
          $class_id = $_POST['class_id'];
          $user = $_POST['user'];
          $birth = $_POST['birth'];
          $gender = $_POST['gender'];
          $db->createSinhVien($user, $birth , $gender);
          $first = $db->fetchLastSinhVien();
          $db->addSinhVienToClass(intval($class_id) ,intval($first));
     }
?>
