<?php
     class DB{
          private $conn = NULL;
          public function __construct(){
               $this->host = "localhost";
               $this->user = "root";
               $this->pass = "";
               $this->db   = "quanlysinhvien";
          }
          public function connect(){
               try{
                    $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               }
               catch(PDOException $e){
                    echo ($e->getMessage());
                    die();
               }
          }
          public function getUserID($user){
               $query = "SELECT * FROM `user` WHERE username='".$user."'";
               $stmt = $this->conn->prepare($query);
               $stmt->execute(); 
               return $stmt->fetch(PDO::FETCH_ASSOC);
          }    
          public function myQuery($query){
               $stmt = $this->conn->prepare($query);
               $stmt->execute();
          }
          public function getClassByID($id){
               $query = "SELECT * FROM `class` WHERE id=".$id;
               $stmt = $this->conn->prepare($query);
               $stmt->execute(); 
               return $stmt->fetch(PDO::FETCH_ASSOC);
          }
          public function getUserFromUserClass($id){
               $stmt = $this->conn->prepare("SELECT * From `user_class` where user_id=".$id);
               $stmt->execute(); 
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
          public function getUserByID($id){
               $query = "SELECT * FROM `user` WHERE id=".$id;
               $stmt = $this->conn->prepare($query);
               $stmt->execute(); 
               return $stmt->fetchAll(PDO::FETCH_ASSOC);    
          }
          public function createUser($username, $password){
               $query = "INSERT INTO `user`(`username`, `password`) VALUES (".$username.",".$password.")";
               myQuery($query);
          }
          public function deleteUser($username){
               $query = "DELETE FROM `user` WHERE username=".$username;
               myQuery($query);
          }
          public function fetchAll($user){
               $query = "SELECT * FROM ".$user;
               $stmt = $this->conn->prepare($query);
               $stmt->execute(); 
               return $stmt->fetchAll(PDO::FETCH_ASSOC);   
          }
          public function createSinhVien($fullname, $birth, $gender){
               $query = "INSERT INTO `sinhvien`(`fullname`,`birth`,`gender`) VALUES (:fullname,:birth,:gender)";
               $stmt = $this->conn->prepare($query);
               $stmt->bindParam(":fullname" , $fullname , PDO::PARAM_STR);
               $stmt->bindParam(":birth" , $birth , PDO::PARAM_STR);
               $stmt->bindParam(":gender" , $gender , PDO::PARAM_STR);
               $stmt->execute();

          }
          public function getSinhVienFromClass($id){
               $stmt = $this->conn->prepare("SELECT `sinhvien_id` from `class_sinhvien` where class_id=".$id);
               $stmt->execute(); 
               return $stmt->fetchAll(PDO::FETCH_ASSOC);  
          }
          public function getSinhVienByID($id){
               $stmt = $this->conn->prepare("SELECT * from `sinhvien` where id=".$id);
               $stmt->execute(); 
               return $stmt->fetch(PDO::FETCH_ASSOC);    
          }
          public function deleteSinhVienByID($id){
               $c=$this->conn->prepare("DELETE FROM sinhvien WHERE id=:id");
               $c->bindParam(":id",$id,PDO::PARAM_INT);
               $c->execute();
          }
          public function fetchLastSinhVien(){
               return $this->conn->lastInsertId();
          }
          public function addSinhVienToClass($class_id , $sinhvien_id){

               $stmt = $this->conn->prepare("INSERT INTO `class_sinhvien`(`class_id`, `sinhvien_id`) VALUES(:class_id, :sinhvien_id)");
               $stmt->bindParam(":class_id" , $class_id ,PDO::PARAM_INT);
               $stmt->bindParam(":sinhvien_id" , $sinhvien_id ,PDO::PARAM_INT);
               $stmt->execute();
          }
          public function signUpUser($username, $password)
          {
               $st = $this->conn->prepare("SELECT * FROM user WHERE username=:username");
               $st->bindParam("username", $username, PDO::PARAM_STR);
               $st->execute();
               $count = $st->rowCount();
               if ($count < 1) {
               $stmt = $this->conn->prepare("INSERT INTO user(username,password) VALUES (:username,:password)");
               $stmt->bindParam("username", $username, PDO::PARAM_STR);
               $stmt->bindParam("password", $password, PDO::PARAM_STR);
               $stmt->execute();
               return true;
               } else {
                return false;
               }
          }
          public function createClass($classname, $subject){
               $q = $this->conn->prepare("SELECT * from `class` WHERE classname=:class AND subject=:sub");
               $q->bindParam("class",$classname, PDO::PARAM_STR);
               $q->bindParam("sub",$subject, PDO::PARAM_STR);
               $q->execute();
               $count = $q->rowCount();
               if($count <1){
                    $stmt = $this->conn->prepare("INSERT INTO `class`(`classname`, `subject`) VALUES(:class, :sub)");
                    $stmt->bindParam("class",$classname, PDO::PARAM_STR);
                    $stmt->bindParam("sub",$subject, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
               }
               return false;
          }
          public function createUserClass($user_id ,$class_id){
               $q= $this->conn->prepare("SELECT * FROM user_class WHERE user_id=:user_id AND class_id=:class_id");
               $q->bindParam("user_id" ,$user_id ,PDO::PARAM_INT);
               $q->bindParam("class_id" ,$class_id ,PDO::PARAM_INT);
               $q->execute();
               $count = $q->rowCount();
               if($count<1){
                    $stmt = $this->conn->prepare("INSERT INTO user_class(user_id, class_id) VALUES (:user_id, :class_id)");
                    $stmt->bindParam("user_id" , $user_id ,PDO::PARAM_INT);
                    $stmt->bindParam("class_id" , $class_id ,PDO::PARAM_INT);
                    $stmt->execute();
                    return true;
                }
               return false; 
          }
          public function LastID(){
               return $this->conn->lastInsertId();
          }
     }
?>
