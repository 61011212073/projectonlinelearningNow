<?php
    session_start();
    if (!isset($_SESSION['student_username'])) {
      header('location: ../login.html');
    }
    if (isset($_GET['subject'])) {
        // session_destroy();
        unset($_SESSION['study_coursesopen_id']);
        header('location: ../student/aboutSubject.php');
      }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['student_username']);
      header('location: ../index.html');
    }
    require("conn.php");
    $username=$_SESSION['student_username'];
    $sql2="SELECT student.student_id,prename.preName_name,student.student_fname,student.student_lname,
    student.student_phone,student.student_facebook,student.student_email,univercity.univercity_thname,faculty.faculty_name,
    department.department_name,student.student_username,student.student_password,student.student_status 
    FROM student 
    INNER JOIN prename ON student.student_prename_id =prename.preName_id 
    INNER JOIN univercity ON student.student_univercity_id=univercity.univercity_id 
    INNER JOIN faculty ON student.student_faculty_id =faculty.faculty_id 
    INNER JOIN department ON student.student_department_id=department.department_id
    WHERE student_username='$username'";
    $result2=mysqli_query($conn,$sql2);
	$result3=mysqli_query($conn,$sql2);
	$result4=mysqli_query($conn,$sql2);

    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT study.study_coursesopen_id,subject.subject_engname,subject.subject_detail_thai,teacher.teacher_fname,teacher.teacher_lname 
    FROM study 
    INNER JOIN student ON study.study_student_id=student.student_id
    INNER JOIN coursesopen ON study.study_coursesopen_id=coursesopen.coursesopen_id
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
    INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
    WHERE student_username='$username'";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Eduglobal - Education & Courses HTML Template">
<meta name="keywords" content="academy, course, education, elearning, learning, education html template, university template, college template, school template, online education template, tution center template">

<!-- SITE TITLE -->
<title>Eduglobal - Education & Courses HTML Template</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="assets2/images/logo3.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="assets2/css/animate.css" />	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css" />
<!-- Google Font -->
<!-- <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet" /> 
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" /> -->
<!-- Icon Font CSS -->
<link rel="stylesheet" href="assets2/css/ionicons.min.css" />
<link rel="stylesheet" href="assets2/css/themify-icons.css" />
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="assets2/css/all.min.css" />
<!--- owl carousel CSS-->
<link rel="stylesheet" href="assets2/owlcarousel/css/owl.carousel.min.css" />
<link rel="stylesheet" href="assets2/owlcarousel/css/owl.theme.css" />
<link rel="stylesheet" href="assets2/owlcarousel/css/owl.theme.default.min.css" />
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="assets2/css/magnific-popup.css" />
<!-- Style CSS -->
<link rel="stylesheet" href="assets2/css/style.css" />
<link rel="stylesheet" href="assets2/css/responsive.css" />
<link rel="stylesheet" id="layoutstyle" href="assets2/color/theme.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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

<!-- LOADER -->
<div id="preloader">
    <span class="spinner"></span>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- END LOADER --> 

<!-- START HEADER -->
<header class="header_wrap dark_skin">
    <div class="container">
        <nav class="navbar navbar-expand-lg"> 
            <a class="navbar-brand" href="afterloginTeacher.html">
                <!--<img class="logo_light" src="assets2/images/logo_white.png" alt="logo" />
                <img class="logo_dark" src="assets2/images/logo_dark.png" alt="logo" />
                <img class="logo_default" src="assets2/images/logo_dark.png" alt="logo" />-->
                <img  src="assets2/images/logo1.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
                <li>
                        <a class="nav-link" href="aboutSubject.php?subject='1'" style="font-family: 'Kanit', sans-serif;">รายวิชาที่ลงทะเบียน</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;" >เกี่ยวกับนักเรียน</a>
                    </li>
                    <li class="dropdown">
                         <?php while($row=mysqli_fetch_array($result2)){ ?>
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" style="font-family: 'Kanit', sans-serif;"><?php echo $row['student_fname'];?> <?php echo $row['student_lname'];?></a>
                        <?php }?>
                        
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">ข้อมูลส่วนบุคคล</a></li> 
                                <!-- <hr> -->
                                
                                <li><a class="dropdown-item nav-link nav_item" href="aboutSubject.php?logout='1'" style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </li> 
                </ul>
            </div>
            
        </nav>
    </div>
</header>
<!-- END HEADER -->  

<!-- START SECTION BLOG -->
<section class="bg_gray">
<br>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                	<h2 style="font-family: 'Kanit', sans-serif;"  >แก้ไขข้อมูลส่วนบุคคล</h2>
                </div>
            </div>
        </div>
		<hr>
		<br>
		
        <!-- <div class="col-12">
            	<div class=" animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="medium_divider"></div>
                	<a href="addsubject.php" class="btn btn-default" style="font-family: 'Kanit', sans-serif; margin-left: 0px" >เพิ่มรายวิชา<i class="ion-ios-plus-thin-right ml-1"></i></a>
                </div>
            </div> -->
        <div class="row" >
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
								<?php while($row=mysqli_fetch_array($result3)){ ?>	
                                <h4><?php echo $row['student_fname'];?> <?php echo $row['student_lname'];?></h4>
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
			<?php while($row=mysqli_fetch_array($result4)){ ?>
			
				<div class="col-lg-8">	
					<form action="../BasicData/Edit/editstd.php" method="post">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">รหัสนิสิต</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_id'];?>" style="font-family: 'Kanit', sans-serif;" name="student_id">
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
									<input type="text" class="form-control" value=" <?php echo $row['student_fname'];?>" style="font-family: 'Kanit', sans-serif;" name="student_fname">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">นามสกุล</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_lname'];?>" style="font-family: 'Kanit', sans-serif;" name="student_lname">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">เบอร์โทรศัพท์</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_phone'];?>" style="font-family: 'Kanit', sans-serif;" name="student_phone">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">เฟสบุ๊ค</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_facebook'];?>" style="font-family: 'Kanit', sans-serif;" name="student_facebook">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">อีเมล</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_email'];?>" style="font-family: 'Kanit', sans-serif;" name="student_email">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">มหาวิทยาลัย</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['univercity_thname'];?>" style="font-family: 'Kanit', sans-serif;" name="univercity_thname">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">คณะ</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['faculty_name'];?>" style="font-family: 'Kanit', sans-serif;" name="faculty_name">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ภาควิชา</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['department_name'];?>" style="font-family: 'Kanit', sans-serif;" name="department_name">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ชื่อผู้ใช้</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_username'];?>" style="font-family: 'Kanit', sans-serif;" name="student_username">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">รหัสผ่าน</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['student_password'];?>" style="font-family: 'Kanit', sans-serif;" name="student_password">
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
				
			</div>
		</div>
	</div>
<br>
            <!-- Profile -->

        
</section>
<!-- END SECTION BLOG -->






<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="assets2/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="assets2/js/jquery-ui.js"></script>
<!-- popper min js --> 
<script src="assets2/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets2/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="assets2/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="assets2/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="assets2/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="assets2/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="assets2/js/jquery.countdown.min.js"></script> 
<!-- jquery.counterup.min js --> 
<script src="assets2/js/jquery.counterup.min.js"></script>
<!-- imagesloaded js --> 
<script src="assets2/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="assets2/js/isotope.min.js"></script>
<!-- jquery.parallax-scroll js -->
<script src="assets2/js/jquery.parallax-scroll.js"></script>
<!-- scripts js --> 
<script src="assets2/js/scripts.js"></script>

</body>
</html>