<?php 
session_start();
if (!isset($_SESSION['student_username'])) {
  header('location: ../login.html');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['student_username']);
  unset($_SESSION['study_coursesopen_id']);
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

$subject=$_GET["subb"];
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
<link rel="shortcut icon" type="image/x-icon" href="assets22/images/logo3.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="assets2/css/animate.css" />	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css" />
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet" /> 
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />
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

</head>

<body>

<!-- LOADER -->
<div id="preloader">
    <span class="spinner"></span>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- END LOADER --> 
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
                        <a class="nav-link" href="aboutSubject.php" style="font-family: 'Kanit', sans-serif;">รายวิชาที่ลงทะเบียน</a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;" >เกี่ยวกับรายวิชา</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;" >เกี่ยวกับนักเรียน</a>
                    </li> -->
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



<!-- START SECTION FEATURE -->
<section class="bg_gray" style="background-color: gainsboro;">
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <br>
                        <h2>เกี่ยวกับรายวิชา</h2><?php //echo $subject?>
                    </div>
                   <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>--> 
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-4 col-md-6"><a href="addsubject.php">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="box_icon bg_danger mb-3" style="background-color: cadetblue;">
                		<img src="assets2/images/bookshelf.png" alt="book" />
                    </div>
                    <div class="intro_desc">
                        <h5>รายวิชาที่เปิดสอน</h5>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div></a>
            </div> -->
            <div class="col-lg-4 col-md-6"><a href="book.php?subject=<?php echo $subject?>">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="box_icon bg_danger mb-3">
                		<img src="assets2/images/book.png" alt="book" />
                    </div>
                    <div class="intro_desc">
                        <h5>หนังสือ & เอกสารประกอบการสอน</h5>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="lecture.php?subject=<?php echo $subject?>">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                	<div class="box_icon bg_default mb-3">
                        <i class="fas fa-pencil-ruler" style="color:#fff;"></i>
                    </div>
                    <div class="intro_desc">
                        <h5>แบบฝึกหัด</h5>
                        <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>-->
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="vdo.php?subject=<?php echo $subject?>">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3">
                        <img src="assets2/images/video.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>วิดีโอการสอน</h5>
                        <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>-->
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="stream.php?subject=<?php echo $subject?>">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3" style="background-color: hotpink;">
                        <img src="assets2/images/stream.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>ไลฟ์สตรีม</h5>
                        <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>-->
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="exam.php?subject=<?php echo $subject?>">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3" style="background-color: lightskyblue;">
                        <img src="assets2/images/test.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>ข้อสอบ</h5>
                        <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>-->
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="detailsubject.php">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3" style="background-color: pink;">
                        <img src="assets2/images/detail.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>คำอธิบายรายวิชา</h5>
                        <!--<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>-->
                    </div>
                </div></a>
            </div>

        </div>
    </div>
</section> 
<!-- END SECTION FEATURE -->


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