<?php
     require("config.php");
     include("includes/header.php");
     
     echo '
<form method="POST"      class="row mt-5" id="signup-form">
     <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
          <div class="form-group bg-info p-5 text-white rounded">
               <label for="username" class="h5 py-2">Username : </label>
               <input type="text" autofocus class="form-control" id="username" name="username">
               <label for="username" class="h5 py-2">Password : </label>
               <input type="password" class="form-control" id="password" name="password">
               <button type="submit" class="btn btn-dark mt-4 px-4" id="submit" name="submit">Signup</button>
               <a class="pl-5 text-white" href="index.php"> I already have an account !!</a>
          </div>
               <div id="handle-error">
     
               </div>
     </div>
     
</form>'
     ;

     include("includes/footer.php");
?>
<script>
     $(document).ready(function(){
          $("#signup-form").submit(function(e){
          e.preventDefault();
          var user = $("#username").val();
          var password = $("#password").val();
          if(user == '' || password== ''){
                    $("#handle-error").html("<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</div>");
          }
          else{
               $.ajax({
               url : 'core/signup.php',
               type : "POST",
               data: {
                    username : $("#username").val(),
                    password : $("#password").val(),
               },
               success : function(res){
                    if(res==1) {
                         alert("Đăng ký thành công");
                         window.location.href = "index.php";
                    }
                    else alert("Lỗi đăng ký !");
               }
               });
          }
     });
     });
</script>
