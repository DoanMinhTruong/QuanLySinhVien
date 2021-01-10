<?php
     include("../config.php");
     if(isset($_POST['id'])){
          $id = intval($_POST['id']);
          $db->deleteSinhVienByID($id);
     }

?>
