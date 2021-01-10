<?php
     include("../config.php");
     if(isset($_POST['id'])){
          $svid = $db->getSinhVienFromClass(intval($_POST['id']));
          $sv = array();
          foreach($svid as $s){
               array_push($sv,$db->getSinhVienByID(intval($s['sinhvien_id'])));
          }
          echo json_encode($sv);
     }
?>
