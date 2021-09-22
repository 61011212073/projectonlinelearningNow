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
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status,teacher_id_id
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql);
  $result2=mysqli_query($conn,$sql);

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
     <style>
    body{
	font-family: 'Kanit', sans-serif;
    background: #f7f7ff;
    margin-top:20px;
}
.card {
	font-family: 'Kanit', sans-serif;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
	font-family: 'Kanit', sans-serif;
    margin-right: .5rem!important;
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
        	<!-- Profile -->
          <div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								
								<div class="mt-3">
								<?php while($row=mysqli_fetch_array($result1)){ ?>	
                                <h4><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></h4>
								<?php }?>
                      <p class="text-secondary mb-1" style="font-family: 'Kanit', sans-serif;">Full Stack Developer</p>
                      <p class="text-muted font-size-sm" style="font-family: 'Kanit', sans-serif;">Bay Area, San Francisco, CA</p>
                      <div class="col-sm-12">
                      <a class="btn btn-info "  href="editProfile.php"  style="font-family: 'Kanit', sans-serif;">Edit</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary" style="font-family: 'Kanit', sans-serif;">ต้าเก้ออออออ</span>
                  </li>
                </ul>
              </div>
            </div>
            <?php while($row=mysqli_fetch_array($result2)){ ?>
			 
       <div class="col-lg-8">	
         <form action="../BasicData/Edit/editlac.php" method="post">
         <div class="card">
           <div class="card-body">
             <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">รหัสบัตรประชาชน</h6>
               </div>
               <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                 <input type="text" class="form-control" value=" <?php echo $row['teacher_id_id'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_id_id" readonly/>
                
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">คำนำหน้าชื่อ</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['preName_name'];?>" style="font-family: 'Kanit', sans-serif;" name="preName_name">
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">ชื่อ</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value=" <?php echo $row['teacher_fname'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_fname">
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">นามสกุล</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['teacher_lname'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_lname">
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">เบอร์โทรศัพท์</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['teacher_phone'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_phone">
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">อีเมล</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['teacher_email'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_email">
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">มหาวิทยาลัย</h6>
               </div>
               <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                 <input type="text" class="form-control" value=" <?php echo $row['univercity_thname'];?>" style="font-family: 'Kanit', sans-serif;" name="univercity_thname" readonly/>
                
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">คณะ</h6>
               </div>
               <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                 <input type="text" class="form-control" value=" <?php echo $row['faculty_name'];?>" style="font-family: 'Kanit', sans-serif;" name="faculty_name" readonly/>
                
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">ภาควิชา</h6>
               </div>
               <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                 <input type="text" class="form-control" value="<?php echo $row['department_name'];?>" style="font-family: 'Kanit', sans-serif; display:block;" name="department_name" readonly/>
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">ชื่อผู้ใช้</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['teacher_username'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_username">
               </div>
             </div>
                           <div class="row mb-3">
               <div class="col-sm-3">
                 <h6 class="mb-0">รหัสผ่าน</h6>
               </div>
               <div class="col-sm-9 text-secondary">
                 <input type="text" class="form-control" value="<?php echo $row['teacher_password'];?>" style="font-family: 'Kanit', sans-serif;" name="teacher_password">
               </div>
             </div>
             <div class="row">
               <div class="col-sm-3"></div>
               <div class="col-sm-9 text-secondary">
                 <input type="submit" class="btn btn-primary px-4" value="แก้ไขข้อมูล" style="font-family: 'Kanit', sans-serif;" name="submit">
               </div>
             </div>
           </div>
         </div>
       </form>
       </div>
       <?php } ?>
        <?php }?>
  </section>

  <script src="menu/script.js"></script>

</body>
</html>
