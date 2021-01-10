<?php 
     if(!isset($_SESSION['user']))
          include("login.php"); 
     else{
          echo '<div class="user-control">
                    <div class="row">
                         <div class="col-sm-2">
                              ';
                    include("includes/navbar.php");
                    $this_user = $_SESSION['user'];
                    $userid = $db->getUserID($this_user);
                    $list_user = $db->getUserFromUserClass($userid['id']);
                    $class = array();
                    foreach($list_user as $l){
                         array_push($class, $db->getClassByID($l['class_id']));
                    }
                    echo  '</div>
                    <div class="col-sm-10">
               <div class="row m-3">';
     if(empty($class)) {
          echo "<div class='alert alert-warning'>Bạn chưa có lớp, vui lòng tạo lớp</div>";
          return;
     }
     else{
          echo "<select id='select-class' class='custom-select'>";
          echo "<option selected>Chọn lớp </option>";
               foreach($class as $c){
                    echo "<option value='".$c['id']."'>".$c['id']." - ".$c['classname']." - ".$c['subject']."</option>";
               }
          echo "</select>";
     }

     echo '        
                    


                    </div>
                    <div class="result"></div>

               </div>
          </div>
     </div>
     ';
}
?>
<script>
     var sel_class;
     $(document).ready(function(){  
          $("#select-class").change(function(){
               sel_class = $(this).val();
               var aajax = $.ajax({
               url : 'core/dashboard.php',
               type : 'POST',
               dataType : 'JSON',
               data : {
                    id : $(this).val()
               },
               success: function(res){
                    var str = `
                         <button type="button" class="btn btn-info my-1" data-toggle="modal" data-target="#add-student-modal">Add Student
                    </button>
                    <div class="modal fade" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="add-student-title" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="add-student-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                        </button>
                                   </div>
                                   <div class="modal-body">
                                        <div>
                                             <label class="px-3">Full Name : </label>
                                             <input id="fullname">
                                        </div>
                                        <div>
                                             <label class="px-4">Birthday : </label>
                                             <input id="birth">
                                        </div>
                                        <div>
                                             <label class="px-1">Gender Name : </label>
                                             <input id="gender">
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="add-student" class="btn btn-primary">Add</button>
                                   </div>
                              </div>
                         </div>
                    </div>

                         `;
                    if(res != ''){
                         var count = 1;

                         str += "<table class='table'><thead><tr><th>#</th><th>Full Name</th><th>Birth</th><th>Gender</th><th>Action</th></tr></thead><tbody>";
                         for (let i in res){
                              str+="<tr><th>" +(count++ )+  "</th>";
                              str += "<td>" + res[i]['fullname'] + "</td>";
                              str += "<td>"+ res[i]['birth'] +  "</td>";
                              str += "<td>" +res[i]['gender'] + "</td>";
                              str += "<td><button class='btn-delete btn btn-danger' value='" +res[i]['id'] + "'>Delete</button></td>";
                              str+="</tr>";
                         }
                         str+="</tbody></table>";
                         $(".result").html(str);
                         $(".btn-delete").click(function() {
                              console.log($(this).val());
                              $.ajax({
                                   url : 'core/delete.php',
                                   type: 'POST',
                                   dataType : 'text',
                                   data: {
                                        id : $(this).val(),
                                   },
                                   success : function(res) {
                                        location.reload();
                                   },
                              });
                         });
                    }else{
                         $(".result").html("<div class='alert alert-warning'> Lớp không có sinh viên!</div>" + str);
                        }
                         $("#add-student").click(function(){
                              var user = $("#fullname").val();
                              var birth = $("#birth").val();
                              var gender = $("#gender").val();
                              if(user == "" || birth == "" || gender == ""){
                                   alert("Vui lòng nhập đầy đủ thông tin !");
                              }
                              else{
                                   $.post({
                                        url :'core/add-student.php',
                                        dataType :'text',
                                        data : {class_id : sel_class,user : user, birth : birth , gender :gender},
                                        success : function(res){
                                             location.reload();
                                        },
                                   });
                              }
                         });
                    },
          });
     });
});
</script>
