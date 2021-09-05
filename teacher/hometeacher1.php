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
  $sql="SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status,teacher.teacher_id_id,teacher.teacher_prename_id
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result=mysqli_query($conn,$sql);
  $resultA=mysqli_query($conn,$sql);
  $resultB=mysqli_query($conn,$sql);

  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
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
     <!-- <link href="Prename1.css" rel="stylesheet"> -->
     <link href="../demo/style.css" rel="stylesheet">
     <script src="../demo/main.js"></script>
      <style>
        body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
      </style>
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
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
    <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav> -->
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                    <?php while($rows=mysqli_fetch_array($resultA)){ ?>
                      <h4><?php echo $rows['teacher_fname'];?> <?php echo $rows['teacher_lname'];?></h4>
                     
                      <p class="text-secondary mb-1" style="font-family: 'Kanit', sans-serif;">Full Stack Developer</p>
                      <p class="text-muted font-size-sm" style="font-family: 'Kanit', sans-serif;">Bay Area, San Francisco, CA</p>
                       <?php }?>
                      <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="editprofile.php">Edit</a>
                    </div>
                  </div>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li> -->
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div> 
            <?php while($row=mysqli_fetch_array($resultB)){ ?>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">เลขประจำตัวประชาชน</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_id_id'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">คำนำหน้าชื่อ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['preName_name'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ชื่อ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_fname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">นามสกุล</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_lname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">เบอร์โทรศัพท์</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_phone'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">อีเมล</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_email'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">มหาวิทยาลัย</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['univercity_thname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">คณะ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['faculty_name'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ภาควิชา</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['department_name'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ชื่อผู้ใช้</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_username'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">รหัสผ่าน</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['teacher_password'];?>
                    </div>
                  </div>
      
                 
                </div>
              </div>
              <?php } ?>
             



            </div>
          </div>

        </div>
    </div>
  </section>

  <script src="menu/script.js"></script>

</body>
</html>
