<?php
     session_start();
     if (!isset($_SESSION['teacher_username'])) {
       header('location: ../login.php');
     }
     if (isset($_GET['logout'])) {
       session_destroy();
       unset($_SESSION['teacher_username']);
       header('location: ../index.html');
     }
     require("conn.php");
     $username=$_SESSION['teacher_username'];
     $sql2="SELECT teacher.teacher_id,prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
     teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
     teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
     FROM teacher 
     INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id 
     INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
     INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
     INNER JOIN department ON teacher.teacher_department_id=department.department_id 
     WHERE teacher_username='$username'";
     $result2=mysqli_query($conn,$sql2);

     mysqli_query($conn,"SET CHARACTER SET UTF8");
     $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
     FROM coursesopen 
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
     INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
     WHERE teacher_username='$username'";
     $result = mysqli_query($conn,$sql);
    
     $sql1="SELECT live.live_id,subject.subject_engname,live.live_story,live.live_link,live.live_datetime 
     FROM live 
     INNER JOIN coursesopen ON live.live_coursesopen_id=coursesopen.coursesopen_id 
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
     INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
     WHERE teacher_username='$username'";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="../demo/style.css" rel="stylesheet">
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
      <?php while($row=mysqli_fetch_array($result2)){ ?>
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
        <h3>ตารางแสดงการไลฟ์</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลไลฟ์
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลไลฟ์</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="./Add/insertlive.php" method="POST">
                        <label for="validationCustom01" class="form-label" >รายวิชา</label>
                        <select class="form-select form-control" aria-label="Default select example" name="live_coursesopen_id">
                            <option selected disabled>-เลือกรายวิชา-</option>
                            <?php
                                  while($rows=mysqli_fetch_row($result)){
                                      $uni_id=$rows[0];
                                      $uni_name=$rows[1];
                                      echo "<option value='$uni_id'>$uni_name</option>";
                                  }
                              ?> 
                          </select>
                          
                        <div >
                            <label for="validationCustom01" class="form-label" >ชื่อไลฟ์</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อไลฟ์" required name="live_story">
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ลิงก์ไลฟ์</label>
                            <input type="url" class="form-control" id="validationCustom01" placeholder="ลิงก์ไลฟ์" required name="live_link">
                                  <!-- <input type="url" name="" id=""> -->
                          </div>
                      
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
                  <th scope="col">รายวิชา</th>
                  <th scope="col">ชื่อไลฟ์</th>
                  <th scope="col">ลิงก์ไลฟ์</th>
                 
                  <th scope="col">แก้ไขข้อมูล</th>
                  <th scope="col">รายละเอียด</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $i=0; while($row=mysqli_fetch_array($result1)){ $i=$i+1?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="รายวิชา"><?php echo $row['subject_engname']?></td>
                  <td data-label="ชื่อไลฟ์"><?php echo $row['live_story']?></td>
                  <td data-label="ลิงก์ไลฟ์"><a href="<?php echo $row['live_link']?>">รับชม</a></td>
                  <td>
                  <button type="button" name="edit"  id="<?php echo $row["live_id"]; ?>" class="btn btn-info btn-xs edit_data"><i class='fas fa-edit'></i></button>
            </td>  
            <td>
                  <button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["live_id"]; ?>" class="btn btn-info btn-xs view_data"><i class='far fa-eye'></i></button>
            </td>   
        </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
    
          </div>
          </section>

<script src="menu/script.js"></script>
<script>  
 $(document).ready(function(){  
     
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../BasicData/live/select.php",  
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
                     url:"../BasicData/live/edit.php",  
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
                     <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลไลฟ์</h4>  
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
                     <h4 class="modal-title"  id="staticBackdropLabel">แก้ไขข้อมูลไลฟ์</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail1">  
                </div>  
               
           </div>  
      </div>  
 </div>  