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
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id";
    $result = mysqli_query($conn,$sql);

    $sql1="SELECT * FROM work ORDER BY work_id DESC";
    $result1 = mysqli_query($conn,$sql1);

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <title> Online Education </title>
    <link rel="stylesheet" href="menu/menu.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets1/images/logo3.png">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="demo/style.css" rel="stylesheet">
     <script src="demo/main.js"></script>
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
        <a href="./teacher/hometeacher1.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./teacher/hometeacher1.php" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
          <li><a href="teacher/opensubject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="teacher/addstudentinsubject.php" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="adddocument.php" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="addvdo.php" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="addexam.php" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="teacher/addstream.php" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="teacher/exampaper.php" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ตรวจข้อสอบ</a></li>
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
          <li ><a href="./teacher/Prename.php" style="font-family: 'Kanit', sans-serif;">- คำนำหน้าชื่อ</a></li>
          <li><a href="./teacher/univercity.php" style="font-family: 'Kanit', sans-serif;">- มหาวิทยาลัย</a></li>
          <li><a href="./teacher/faculty.php" style="font-family: 'Kanit', sans-serif;">- คณะ</a></li>
          <li><a href="./teacher/department.php" style="font-family: 'Kanit', sans-serif;">- ภาควิชา</a></li>
          <li><a href="./teacher/course.php" style="font-family: 'Kanit', sans-serif;">- หลักสูตร</a></li>
          <li><a href="./teacher/subject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชา</a></li>
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
        <h3>ตารางแสดงแบบฝึกหัด</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลแบบฝึกหัด
              </button>&nbsp;&nbsp;
              <select name="" id="" class="btn btn-primary">
            <option value="">-ค้นหารายวิชา-</option>
          </select>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลแบบฝึกหัด</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
            <form action="inwork.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style='font-family: Kanit, sans-serif;'>
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <select name="work_courseopen_id" style="font-family: 'Kanit', sans-serif;">
                    <option style="font-family: 'Kanit', sans-serif;">-เลือกรายวิชาที่เปิดสอน-</option>
                        <?php
                            while($rows=mysqli_fetch_row($result)){
                                $uni_id=$rows[0];
                                $uni_name=$rows[1];
                                echo "<option value='$uni_id' style='font-family: Kanit, sans-serif;'>$uni_name</option>";
                            }
                        ?> 
                    </select>
                    <!-- <input type="text" required class="form-control" name="prename"> -->
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ชื่อแบบฝึกหัด :</label>
                    <input type="text" required class="form-control" name="work_name" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">รายละเอียดแบบฝึกหัด :</label>
                    <!-- <input type="text"   name="document_name" > -->
                    <textarea class="form-control" required name="work_detail" cols="10" rows="10" style="font-family: 'Kanit', sans-serif;"></textarea>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ไฟล์แบบฝึกหัด :</label>
                    <input type="file" required class="form-control" name="work_file" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">วันที่ส่ง :</label>
                    <input type="date" required class="form-control" name="work_enddate" style="font-family: 'Kanit', sans-serif;">
                    <!-- <input type="time" name="" id=""> -->
                </div>
                <div class="form-group" style="font-family: 'Kanit', sans-serif;">
                    <label for="pwd" style="font-family: 'Kanit', sans-serif;">สถานะ :</label>
                    <!-- <input type="text" class="form-control" name="status_prename"> -->
                    <input type="radio" name="work_status" required value="1" style="font-family: 'Kanit', sans-serif;"> เปิดการใช้งาน
                    <input type="radio" name="work_status" value="0" style="font-family: 'Kanit', sans-serif;"> ปิดการใช้งาน
                </div>
                
                
           
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit" style="font-family: 'Kanit', sans-serif;">ยืนยัน</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: 'Kanit', sans-serif;">ปิด</button>
            </div>
            </form>
            </div>
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
                  <th scope="col">ชื่อแบบฝึกหัด</th>
                  <th scope="col">ไฟล์แบบฝึกหัด</th>
                  <th scope="col">วันที่ส่งงาน</th>
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                  <th scope="col">การส่งงาน</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row = mysqli_fetch_array($result1)){ $i=$i+1 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="ชื่อแบบฝึกหัด"><?php echo $row['work_name'];?></td>
                  <td data-label="ไฟล์แบบฝึกหัด"><a href="uploadwork/<?=$row["work_file"]?>"><?php echo $row["work_name"];?></a></td>
                  <td data-label="วันและเวลา"><?php echo $row['work_enddate'];?></td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                          // if ($row['faculty_status'] == "1") {
                            echo "<a style='color:#228B22;'>Active</a>";
                        //   }
                        //  else{
                        //     echo "<a style='color:red;'>Inactive</a>";
                        //  }
                   ?>
                  </td>
                  <td data-label="รายละเอียด">
                    <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #14746f; border-color: #14746f;">
                <i class="fa fa-eye"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <!-- modal-fullscreen เต็มจอ modal-xl-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลคณะ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-borderless" >
                        <thead>
                          <tr>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">ข้อมูล</th>
                          </tr>
                        </thead>
                        <tbody>
                          <div>
                            <tr>
                              <th scope="row">ลำดับ</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th scope="row">รหัสนิสิต</th>
                              <td>นาย</td>
                            </tr>
                            <tr>
                              <th scope="row">ชื่อ</th>
                              <td>ใช้งาน</td>
                            </tr>
                            <tr>
                                <th scope="row">นามสกุล</th>
                                <td>ใช้งาน</td>
                              </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td>ใช้งาน</td>
                            </tr>
                          </div>
                          
                         
                        </tbody>
                      </table>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
              </div>
            </div>
          </div>
          <!-- modal -->
        </td>
        <td data-label="แก้ไขข้อมูล">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background-color: #036666; border-color: #036666;" >
            <i class="fa fa-edit"></i>
          </button>
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลแบบฝึกหัด</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3 needs-validation" novalidate>
                    <label for="validationCustom01" class="form-label" >รายวิชา</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected>เลือกรายวิชา</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      
                    <div >
                        <label for="validationCustom01" class="form-label" >ชื่อแบบฝึกหัด</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกแบบฝึกหัด" required>
                      </div>
                      
                      <div >
                        <label for="formFile" class="form-label">ไฟล์แบบฝึกหัด</label>
                        <input class="form-control" type="file" id="formFile">
                        </div>
                      
                    <!-- <div class="col-12">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                      </div>
                    </div> -->
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-success">แก้ไขข้อมูล</button>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td data-label="การส่งงาน">
            <a class="btn btn-primary" href="report.php" role="button" style="background-color: #14746f; border-color: #14746f;"> <i class="fa fa-clipboard"></i></a>
           
</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
    
          </div>
      
      
          </section>

<script src="menu/script.js"></script>

</body>
</html>