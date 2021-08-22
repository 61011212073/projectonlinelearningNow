<?php
  session_start();
  if (!isset($_SESSION['admin_username'])) {
    header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_username']);
    header('location: ../index.html');
  }
  require("conn.php");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $username=$_SESSION['admin_username'];
    $sql="SELECT admin_fname,admin_lname FROM admin WHERE admin_username='$username'";
    $result=mysqli_query($conn,$sql);
  // $sql="SELECT * FROM prename";
  // $result = mysqli_query($conn,$sql);

  $query=mysqli_query($conn,"SELECT COUNT(preName_id) FROM `prename`");
$row = mysqli_fetch_row($query);

$rows = $row[0];

$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 10 record / หน้า 

$last = ceil($rows/$page_rows);

if($last < 1){
  $last = 1;
}

$pagenum = 1;

if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
  $pagenum = 1;
}
else if ($pagenum > $last) {
  $pagenum = $last;
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

$nquery=mysqli_query($conn,"SELECT * FROM prename $limit");

$paginationCtrls = '';

if($last != 1){

if ($pagenum > 1) {
      $previous = $pagenum - 1;
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info" style="font-family: Kanit, sans-serif;"><-</a> &nbsp; &nbsp; ';
      
              for($i = $pagenum-4; $i < $pagenum; $i++){
                  if($i > 0){
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary" style="font-family: Kanit, sans-serif;">'.$i.'</a> &nbsp; ';
                  }
          }
      }
      
          $paginationCtrls .= ''.$pagenum.' &nbsp; ';
      
          for($i = $pagenum+1; $i <= $last; $i++){
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary" style="font-family: Kanit, sans-serif;">'.$i.'</a> &nbsp; ';
              if($i >= $pagenum+4){
                  break;
              }
          }
      
      if ($pagenum != $last) {
      $next = $pagenum + 1;
      $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info" style="font-family: Kanit, sans-serif;">-></a> ';
      }
          }
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Online Education </title>
    
    <link rel="stylesheet" href="menu/menu.css">
    <link rel="shortcut icon" type="image/x-icon" href="../assets1/images/logo3.png">
    <!-- Boxiocns CDN Link -->
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="../demo/style.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
     <script src="../demo/main.js"></script>
   </head>
<body>
<div class="sidebar close">
    <div class="logo-details">
      <i><img src="image/logo1.png" alt="profileImg" style="width: 40px;  height:40px;"></i>
      <!-- <img src="image/logo1.png" alt="profileImg" style="width: 50px;  height:12px;"> -->
      <span class="logo_name">MSU Education</span>
      <!-- <img src="image/logo.png" alt="profileImg" style="width: 150px;  height:212px; float:top;"> -->
    </div>
    <ul class="nav-links">
      <li>
        <a href="homeadmin.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">HOME</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="homeadmin.php">HOME</a></li>
        </ul>
      </li>
      <li>
        <a href="teacher.php">
        <i class='bx bx-user' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลอาจารย์</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher.php" style="font-family: 'Kanit', sans-serif;">ข้อมูลอาจารย์</a></li>
        </ul>
      </li>
      <li>
        <a href="student.php">
          <!-- <i class='bx bx-line-chart' ></i> -->
          <i class='bx bx-user' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลนิสิต</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="student.php" style="font-family: 'Kanit', sans-serif;">ข้อมูลนิสิต</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-data'></i>
            <span class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลพื้นฐาน</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลพื้นฐาน</a></li>
          <li ><a href="Prename.php" style="font-family: 'Kanit', sans-serif;">- คำนำหน้าชื่อ</a></li>
          <li><a href="univercity.php" style="font-family: 'Kanit', sans-serif;">- มหาวิทยาลัย</a></li>
          <li><a href="faculty.php" style="font-family: 'Kanit', sans-serif;">- คณะ</a></li>
          <li><a href="department.php" style="font-family: 'Kanit', sans-serif;">- ภาควิชา</a></li>
          <li><a href="course.php" style="font-family: 'Kanit', sans-serif;">- หลักสูตร</a></li>
          <li><a href="subject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชา</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!-- <img src="image/profile.jpg" alt="profileImg"> -->
        <img src="image/logo1.png" alt="profileImg" style="width: 55px;  height:55px;">
      </div>
      <?php while($row=mysqli_fetch_array($result)){ ?>
      <div class="name-job">
        <div class="profile_name"><?php echo $row['admin_fname'];?></div>
        <div class="job"><?php echo $row['admin_lname'];?></div>
      </div>
      <?php }?>
      <a href="homeadmin.php?logout='1'">
        <i class='bx bx-log-out' ></i>
      </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Online Education</span>
    </div>
    <div class="wrapper">

<section>
  <div class="container-fluid">
    <h3>ตารางแสดงข้อมูลคำนำหน้าชื่อ</h3>

          <br>
          
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
            เพิ่มข้อมูลคำนำหน้าชื่อ
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-color" id="staticBackdropLabel" >เพิ่มข้อมูลคำนำหน้าชื่อ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3 needs-validation" novalidate action="./Add/insertpre.php" method="post">
                    <div >
                      <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ</label>
                      <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="prename">
                    </div>
                </div>
                
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="บันทึกข้อมูล">
                </div>
              </form>  
              </div>
            </div>
          </div>

          
        </section>
        <br>
        <br>
        <!-- ตารางแสดงข้อูล -->
        <table>
          <thead>
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">คำนำหน้าชื่อ</th>
              <th scope="col">สถานะการใช้งาน</th>
              <th scope="col">แก้ไขข้อมูล</th>
              <th scope="col">รายละเอียด</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
            <tr>
              <td data-label="ลำดับ"><?php echo $i;?></td>
              <td data-label="คำนำหน้าชื่อ"><?php echo $row["preName_name"];?></td>
              <td data-label="สถานะการใช้งาน">
                <?php
                      if ($row['preName_status'] == "1") {
                         echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
                      }
                     else{
                        echo "<a style='color:red;'>ปิดการใช้งาน</a>";
                     }
               ?>
              </td>
              <td><input type="button" name="edit" value="Edit" id="<?php echo $row["preName_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
              <td><input type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["preName_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
            </tr>
            <?php } ?>
          </tbody>
          
        </table><br>
        <div id="pagination_controls" style="font-family: Kanit, sans-serif;"><?php echo $paginationCtrls; ?></div>
      </div>

 


  </section>

  <script src="menu/script.js"></script>
    <script src="../dist/vertical-responsive-menu.min.js"></script>
    <script type="text/javascript">
        function input(inputclass,filter){
            for (var i = 0; i < inputclass.length; i++) {
                ["input"].forEach(function(event){
                    inputclass[i].addEventListener(event, function(){
                        console.log(this.value);
                        if (!filter(this.value)) {
                            this.value="";
                        }
                    });
                });

            }
        }
        input(document.getElementsByClassName("th"),function (value) {
            return /^[ก-๏\s]+$/.test(value); //สำหรับภาษาไทย
        });
        input(document.getElementsByClassName("eng"),function (value) {
            return /^[a-zA-Z\s]+$/.test(value); //สำหรับภาษาอังกฤษ
        });
        input(document.getElementsByClassName("number"),function (value) {
            return /^[0-9]*$/.test(value); //สำหรับตัวเลข
        });
    </script>
    <script>
    $(document).ready(function(){
    $('.editbtn').on('click', function(){
        // $('#editmodal').modla('show');
        console.log("Hello");

    });
    });
    </script>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#prename').val(data.prename);  
                    //  $('#address').val(data.address);  
                    //  $('#gender').val(data.gender);  
                    //  $('#designation').val(data.designation);  
                    //  $('#age').val(data.age);  
                    //  $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#dataModal').modal('show');  
                }  
           });  
      });  
      


      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
</body>
</html>
<div id="dataModal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลคำนำหน้าชื่อ</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
               
           </div>  
      </div>  
 </div>  

 <div id="dataModal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลคำนำหน้าชื่อ</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
               
           </div>  
      </div>  
 </div>  
 <!-- <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Employee Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Employee Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Enter Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" />  
                          <br />  
                          <label>Enter Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>   -->
