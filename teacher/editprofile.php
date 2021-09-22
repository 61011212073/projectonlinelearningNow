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
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result=mysqli_query($conn,$sql);

  mysqli_query($conn,"SET CHARACTER SET UTF8");
mysqli_query($conn,"SET CHARACTER SET UTF8");
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Online Education </title>
    <link rel="stylesheet" href="./menu/style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename.css" rel="stylesheet">
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
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
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
        <div class="profile_name" style="font-family: 'Kanit', sans-serif;"><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></div>
        <div class="job" style="font-family: 'Kanit', sans-serif;">Teacher</div>
      </div>
    </a>
      <?php //}?>
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
    <div class="home-content">
      
      <span class="text" style="font-family: 'Kanit', sans-serif; margin-left: 100px">แก้ไขข้อมูลส่วนตัว</span>
    </div><br>
        <form action="" method="post">
        <?php //while($row=mysqli_fetch_array($result)){ ?>
            <div style="margin-left: 100px">
                <label for="" style="font-family: 'Kanit', sans-serif;">คำนำหน้าชื่อ:</label>
                <input type="text" value="<?php echo $row['preName_name']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 160px">
                <label for="" style="font-family: 'Kanit', sans-serif;">ชื่อ: </label>
                <input type="text" value="<?php echo $row['teacher_fname']?>" name="" style="font-family: 'Kanit', sans-serif;">
                <label for="" style="font-family: 'Kanit', sans-serif;">นามสกุล: </label>
                <input type="text" value="<?php echo $row['teacher_lname']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">เบอร์โทร: </label>
                <input type="text" value="<?php echo $row['teacher_phone']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">อีเมล์: </label>
                <input type="text" value="<?php echo $row['teacher_email']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">มหาวิทยาลัย: </label>
                <input type="text" value="<?php echo $row['univercity_name']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">คณะ: </label>
                <input type="text" value="<?php echo $row['teacher_phone']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">ภาควิชา: </label>
                <input type="text" value="<?php echo $row['teacher_phone']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">ชื่อผู้ใช้: </label>
                <input type="text" value="<?php echo $row['teacher_username']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <label for="" style="font-family: 'Kanit', sans-serif;">รหัสผ่าน: </label>
                <input type="text" value="<?php echo $row['teacher_password']?>" name="" style="font-family: 'Kanit', sans-serif;">
            </div><br>
            <div style="margin-left: 125px">
                <button type="submit" name="" style="font-family: 'Kanit', sans-serif;" class="btn btn-success">แก้ไขข้อมูล</button>
            </div>
        </form>
        <?php }?>
  </section>

  <script src="menu/script.js"></script>

</body>
</html>
