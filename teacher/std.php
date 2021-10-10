<?php
  session_start();
  if (!isset($_SESSION['teacher_username'])) {
    header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['teacher_username']);
    header('location: ../index.php');
  }
  require("conn.php");
  $username=$_SESSION['teacher_username'];
  $sql="SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result=mysqli_query($conn,$sql);
// $sql="SELECT * FROM prename";
// $result = mysqli_query($conn,$sql);

$query=mysqli_query($conn,"SELECT COUNT(student_id) FROM `student`");
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

$nquery=mysqli_query($conn,"SELECT student.student_id,prename.preName_name,student.student_fname,student.student_lname,
student.student_phone,student.student_facebook,student.student_email,univercity.univercity_thname,faculty.faculty_name,
department.department_name,student.student_username,student.student_password,student.student_status 
FROM student 
INNER JOIN prename ON student.student_prename_id =prename.preName_id 
INNER JOIN univercity ON student.student_univercity_id=univercity.univercity_id 
INNER JOIN faculty ON student.student_faculty_id =faculty.faculty_id 
INNER JOIN department ON student.student_department_id=department.department_id $limit");

$paginationCtrls = '';

if($last != 1){

if ($pagenum > 1) {
    $previous = $pagenum - 1;
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info"><-</a> &nbsp; &nbsp; ';
    
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
                }
        }
    }
    
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
    
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
            if($i >= $pagenum+4){
                break;
            }
        }
    
    if ($pagenum != $last) {
    $next = $pagenum + 1;
    $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">-></a> ';
    }
        }

$sql1="SELECT * FROM univercity";
$result1 = mysqli_query($conn,$sql1);
$sql2="SELECT * FROM faculty";
$result2 = mysqli_query($conn,$sql2);
$sql3="SELECT * FROM department";
$result3 = mysqli_query($conn,$sql3);
$sql4="SELECT * FROM prename";
$result4 = mysqli_query($conn,$sql4);
?>
<!DOCTYPE html>
<html lang="pt-br">

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
     <script src="../demo/main.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   </head>

<body style="font-family: Kanit, sans-serif;">
<div class="sidebar close">
<div class="logo-details">
      <i><img src="image/logo1.png" alt="profileImg" style="width: 40px;  height:40px;"></i>
      <!-- <img src="image/logo1.png" alt="profileImg" style="width: 50px;  height:12px;"> -->
      <span class="logo_name">MSU Education</span>
      <!-- <img src="image/logo.png" alt="profileImg" style="width: 150px;  height:212px; float:top;"> -->
    </div>
    <ul class="nav-links">
      <li>
        <a href="hometeacher1.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
        </ul>
      </li>
      <li>
        <a href="std.php">
          <!-- <i class='bx bx-line-chart' ></i> -->
          <i class='bx bx-user' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลนิสิต</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="std.php" style="font-family: 'Kanit', sans-serif;">ข้อมูลนิสิต</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name" style="font-family: 'Kanit', sans-serif;">การทำงานอาจารย์</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#" style="font-family: 'Kanit', sans-serif;">การทำงานอาจารย์</a></li>
          <li><a href="opensubject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="addstudentinsubject.php" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="../adddocument.php" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="../addvdo.php" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="../addexam.php" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="addstream.php" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="exampaper.php" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
          <li><a href="checkexam.php" style="font-family: 'Kanit', sans-serif;">- ตรวจข้อสอบ</a></li>
          <li><a href="news.php" style="font-family: 'Kanit', sans-serif;">- ข่าวสาร</a></li>
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
    <a href="editprofile.php">
      <div class="name-job">
        <div class="profile_name" style="font-family: 'Kanit', sans-serif; font-size: 14px;"><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></div>
        <div class="job" style="font-family: 'Kanit', sans-serif;">Teacher</div>
      </div>
    </a>
      <?php }?>
      <a href="hometeacher1.php?logout='1'">
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
        <h3>ตารางแสดงข้อมูลนิสิต</h3>

              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลนิสิต
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลนิสิต</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="./Add/addstd.php" method="post">
                        <div >
                          <label for="validationCustom01" class="form-label" >รหัสนิสิต</label>
                          <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกรหัสนิสิต" required name="student_id">
                        </div>
                        <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ</label>
                        <select class="form-select form-control" aria-label="Default select example" name="student_prename_id">
                            <option selected>-เลือกคำนำหน้าชื่อ-</option>
                                <?php
                                    while($rows=mysqli_fetch_row($result4)){
                                        $uni_id=$rows[0];
                                        $uni_name=$rows[1];
                                        echo "<option value='$uni_id'>$uni_name</option>";
                                    }
                                ?> 
                        </select> 
                        <div >
                            <label for="validationCustom01" class="form-label" >ชื่อ</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกชื่อ" required name="student_fname">
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >นามสกุล</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกนามสกุล" required name="student_lname">
                            
                          </div>
                          <div>
                          <label for="validationCustom01" class="form-label" >เบอร์โทร</label>
                          <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกเบอร์โทร" required name="student_phone">
                         
                        </div>
                        <div>
                        <label for="validationCustom01" class="form-label" >ลิงค์เฟสบุ๊ค</label>
                          <input type="url" class="form-control" id="validationCustom01" placeholder="กรอกลิงค์เฟสบุ๊ค" required name="student_facebook">
                        </div>
                        <div >
                          <label for="validationCustom01" class="form-label" >อีเมลล์</label>
                          <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกอีเมลล์" required name="student_email">
                         
                        </div>
                          <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>
                          <select class="form-select form-control" aria-label="Default select example" name="student_univercity_id">
                              <option selected>-เลือกมหาวิทยาลัย-</option>
                              <?php
                                  while($rows=mysqli_fetch_row($result1)){
                                      $uni_id=$rows[0];
                                      $uni_name=$rows[1];
                                      echo "<option value='$uni_id'>$uni_name</option>";
                                  }
                              ?> 
                            </select> 
                            <label for="validationCustom01" class="form-label" >คณะ</label>
                            <select class="form-select form-control" aria-label="Default select example" name="student_faculty_id">
                                <option selected>-เลือกคณะ-</option>
                                <?php
                                    while($rows=mysqli_fetch_row($result2)){
                                        $uni_id=$rows[0];
                                        $uni_name=$rows[2];
                                        echo "<option value='$uni_id'>$uni_name</option>";
                                    }
                                ?> 
                              </select> 
                              <label for="validationCustom01" class="form-label" >ภาควิชา</label>
                              <select class="form-select form-control" aria-label="Default select example" name="student_department_id">
                                  <option selected>-เลือกภาควิชา-</option>
                                  <?php
                                      while($rows=mysqli_fetch_row($result3)){
                                          $uni_id=$rows[0];
                                          $uni_name=$rows[1];
                                          echo "<option value='$uni_id'>$uni_name</option>";
                                      }
                                  ?> 
                                </select> 
                          <div >
                            <label for="validationCustom01" class="form-label" >ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกชื่อผู้ใช้" required name="student_username">
                            
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >รหัสผ่าน</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกรหัสผ่าน" required name="student_password">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                      <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div></form>
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
                            <th scope="col">รหัสนิสิต</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">รหัสผ่าน</th>
                            <!-- <th scope="col">สถานะการใช้งาน</th>   -->
                            <th scope="col">แก้ไขข้อมูล</th>
                            <th scope="col">รายละเอียด</th>
                          
                </tr>
              </thead>
              <tbody>
                <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="รหัสนิสิต"><?php echo $row[0];?></td>
                  <td data-label="ชื่อ"><?php echo $row[2];?></td>
                  <td data-label="นามสกุล"><?php echo $row[3];?></td>
                  <td data-label="ชื่อผู้ใช้"><?php echo $row['student_username'];?></td>
                  <td data-label="รหัสผ่าน"><?php echo $row['student_password'];?></td>
                  <!-- <td data-label="สถานะการใช้งาน">
                    <?php
                      //   if ($row['student_status'] == "1") {
                      //     echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
                      //  }
                      // else{
                      //    echo "<a style='color:red;'>ปิดการใช้งาน</a>";
                      // }
                      ?>
                  </td> -->
                  <td>
                  <button type="button" name="edit"  id="<?php echo $row["student_id"]; ?>" class="btn btn-info btn-xs edit_data"><i class='fas fa-edit'></i></button>
            </td>  
            <td>
                  <button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["student_id"]; ?>" class="btn btn-info btn-xs view_data"><i class='far fa-eye'></i></button>
            </td>   

                </tr>
                <?php } ?>
              </tbody>
              <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
            </table>
    
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
   
    $(document).on('click', '.view_data', function(){  
         var employee_id = $(this).attr("id");  
         if(employee_id != '')  
         {  
              $.ajax({  
                   url:"../BasicData/student/select.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                   success:function(data){  
                        $('#employee_detail').html(data);  
                        $('#dataModal').modal('show');  
                   }  
              });  
         }            
    });  
    $(document).on('click', '.edit_data', function(){  
         var employee_id = $(this).attr("id");  
         if(employee_id != '')  
         {  
              $.ajax({  
                   url:"../BasicData/student/edit.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                   success:function(data){  
                        $('#employee_detail1').html(data);  
                        $('#dataModal1').modal('show');  
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
                   <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลนิสิต</h4>  
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>  
              <div class="modal-body" id="employee_detail">  
              </div>  
             
         </div>  
    </div>  
</div>  
<div id="dataModal1" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
    <div class="modal-dialog">  
         <div class="modal-content">  
              <div class="modal-header">  
                   <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                   <h4 class="modal-title"  id="staticBackdropLabel">แก้ไขข้อมูลนิสิต</h4>  
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>  
              <div class="modal-body" id="employee_detail1">  
              </div>  
             
         </div>  
    </div>  
</div>  


