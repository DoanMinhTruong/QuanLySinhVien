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
                         <div class="bg-light rounded p-5 form-group" id="taolop-form">
                              <div>
                                   <label>Tên lớp : </label>
                                   <input autofocus class="form-control" id="classname">
                              </div>
                              <div>
                                   <label>Môn học : </label>
                                   <input class="form-control" id="subject">
                              </div>
                              <button type="submit" id="submit" name="submit" class="btn mt-3 btn-info">Tạo lớp</button>
                         </div>
                         <div id="handle-error"></div>
               </div>
          </div>
     </div>
     ';
}
?>
<script>
     $(document).ready(function(){
          $("#submit").click(function(){
               var classname = $("#classname").val();
               var subject   = $("#subject").val();
               if(classname =='' || subject==''){
                    $("#handle-error").html("<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</div>");
               }
               else{
                    $.ajax({
                         url : 'core/create-class.php',
                         dataType : 'text',
                         type : "post",
                         data : {
                              classname : classname,
                              subject : subject,
                         },
                         success: function(res){
                              if(res == 1)
                              {
                                   alert("Tạo lớp thành công!");
                                   window.location.href = "index.php";
                              }else{
                                   alert("Lỗi tạo lớp!");
                              }
                              // alert(res);
                         }
                    });
               }
          });
     });
</script>
