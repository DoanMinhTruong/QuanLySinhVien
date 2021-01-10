
<form method="POST"      class="row mt-5" id="login-form">
     <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
          <div class="form-group bg-dark p-5 text-white rounded">
               <label for="username" class="h5 py-2">Username : </label>
               <input type="text" autofocus class="form-control" id="username" name="username">
               <label for="username" class="h5 py-2">Password : </label>
               <input type="password" class="form-control" id="password" name="password">
               <button type="submit" class="btn btn-info mt-4 px-4" id="submit" name="submit">Login</button>
               <a class="pl-5 text-white" href="signup.php">Dont have an account ?</a>
          </div>
               <div id="handle-error">
     
               </div>
     </div>
     
</form>

<script type="text/javascript">
     $(document).ready(function(){
          $("#login-form").submit(function(e){
               e.preventDefault();
               var user = $("#username").val().trim();
               var pass = $("#password").val().trim();
               if(user == '' || pass == '')
                    $("#handle-error").html("<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</div>");
               else{
                    $.ajax({
                         url : 'core/login-form.php',
                         type: 'post',
                         dataType: 'text',
                         data : {username : user ,password : pass},
                         success : function(response){
                              if(response == 1) {
                                   window.location = "index.php";
                              }
                              else{
                                   $("#handle-error").html("<div class='alert alert-danger'>Sai tài khoản hoặc mật khẩu</div>");
                              }
                         },
                    });
               }
          });
     });
</script>
