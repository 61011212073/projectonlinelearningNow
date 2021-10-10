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
  $sql="SELECT teacher.teacher_id,prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id 
  INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result=mysqli_query($conn,$sql);

  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8"); 
  $sql11="SELECT subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status,coursesopen.coursesopen_id
  FROM coursesopen 
  INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
  INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
  WHERE teacher_username='$username'";
  $result11 = mysqli_query($conn,$sql11);

  $sql1="SELECT * FROM subject";
  $result1 = mysqli_query($conn,$sql1);
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
     <link href="Prename2.css" rel="stylesheet">
     <link href="../demo/style.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
     <script src="../demo/main.js"></script>
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
        <a href="hometeacher1.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="hometeacher1.php" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
    <h3>ตารางแสดงข้อมูลรายวิชาที่เปิดสอน</h3>
          <br>
          
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
            เพิ่มข้อมูลรายวิชาที่เปิดสอน
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลรายวิชาที่เปิดสอน</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3 needs-validation" novalidate action="../teacher/Add/insertopsj.php" method="POST">
                    <label for="validationCustom01" class="form-label" >รายวิชา</label>
                    <select class="form-select form-control" aria-label="Default select example" name="coursesopen_subject_id">
                        <option selected>-เลือกรายวิชา-</option>
                        <?php
                              while($rows=mysqli_fetch_row($result1)){
                                  $uni_id=$rows[0];
                                  $uni_name=$rows[1];
                                  echo "<option value='$uni_id'>$uni_name</option>";
                              }
                          ?> 
                      </select>
                      
                 
                    <div >
                        <label for="validationCustom01" class="form-label" >ภาคการศึกษา</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="ภาคการศึกษา" required name="coursesopen_term">
                      </div>
                      <div >
                        <label for="validationCustom01" class="form-label" >ปีการศึกษา</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="ปีการศึกษา" required name="coursesopen_schoolyear">
                      </div>
                      
                    <!-- <div class="col-12">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                      </div>
                    </div> -->
                   
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
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
            
              <th scope="col">ชื่อวิชา</th>
              <th scope="col">ภาคการศึกษา</th>
              <th scope="col">ปีการศึกษา</th>
              <th scope="col">สถานะการใช้งาน</th>  
              <!-- <th scope="col">แก้ไขข้อมูล</th> -->
              <th scope="col">รายละเอียด</th>
            
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php $i=0; while($row=mysqli_fetch_array($result11)){ $i=$i+1 ?>
              <td data-label="ลำดับ"><?php echo $i;?></td>
              <td data-label="ชื่อวิชา"><?php echo $row['subject_engname'];?></td>
              <td data-label="ภาคการศึกษา"><?php echo $row['coursesopen_term'];?></td>
              <td data-label="ปีการศึกษา"><?php echo $row['coursesopen_schoolyear'];?></td>
              <td>
              <?php
                    if ($row["coursesopen_status"]==1) {
                      echo '<div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="icon'.$row["coursesopen_id"].'" checked>
                    </div>';
                    }
                    else if ($row["coursesopen_status"]==0) {
                      echo '<div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="icon'.$row["coursesopen_id"].'">
                    </div>';
                    }
                ?>
                <!-- <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                  <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
                </div> -->
                <script>
                    $(function() {
                      $('#icon<?php echo $row['coursesopen_id']; ?>').change(function() {
                        //alert($(this).prop('checked'));
                        var ch_val = $(this).prop('checked');
                        var rel = <?php echo $row['coursesopen_id']; ?>;
                        //alert(ch_val);

                        if(ch_val==true){
                          var status = 1;
                          // alert(status,"เปิดสถานะการใช้งาน");
                        }
                        if(ch_val==false){
                          var status = 0;
                          // alert(status,"ปิดสถานะการใช้งาน");
                        }

                        $.ajax({
                            url: '../teacher/status/statusopensubject.php',
                            type: 'POST',
                            data: {id: rel, value: status,},
                            async: false,
                            success: function (data) {
                              // console.log(data);
                              }
                          });

                    
                      })
                    })
                </script>
              </td>
              </td> 
              <!-- <td><input type="button" name="edit" value="Edit" id="<?php echo $row["coursesopen_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>   -->
              <td>
              <button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["coursesopen_id"]; ?>" class="btn btn-info btn-xs view_data"><i class='far fa-eye'></i></button>
              </td>  
            </tr>
            <?php } ?>
          </tbody>
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
                   url:"../BasicData/opensubject/select.php",  
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
                   <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลรายวิชาที่เปิดสอน</h4>  
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>  
              <div class="modal-body" id="employee_detail">  
              </div>  
             
         </div>  
    </div>  
</div>  


