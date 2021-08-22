<?php
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen INNER JOIN subject ON coursesopen.coursesopen_id=subject.subject_id";
    $result = mysqli_query($conn,$sql);

    $sql1="SELECT * FROM document ORDER BY document_id DESC";
    $result1 = mysqli_query($conn,$sql1);

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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="style1.css" rel="stylesheet">
  <script src="main.js"></script>
  
<style>

    .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" style="font-family: 'Kanit', sans-serif;">ข้อมูลพื้นฐาน</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">คำนำหน้าชื่อ</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">มหาวิทยาลัย</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">คณะ</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">ภาควิชา</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">หลักสูตร</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">รายวิชา</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <li>
                        <a class="nav-link" href="aboutSubject.php" style="font-family: 'Kanit', sans-serif;">เกี่ยวกับรายวิชา</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">เกี่ยวกับนักเรียน</a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">แบบฝึกหัด</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">วิดีโอการสอน</a>
                    </li> -->
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
            
        </nav>
    </div>
</header>
<!-- END HEADER -->  
<!-- START SECTION FEATURE -->
<!-- <section class="bg_gray" >
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>เกี่ยวกับรายวิชา</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6"><a href="book.php">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="box_icon bg_danger mb-3">
                		<img src="assets2/images/book.png" alt="book" />
                    </div>
                    <div class="intro_desc">
                        <h5>หนังสือ & เอกสารประกอบการสอน</h5>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="#">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                	<div class="box_icon bg_default mb-3">
                		
                        <i class="fas fa-pencil-ruler" style="color:#fff;"></i>
                    </div>
                    <div class="intro_desc">
                        <h5>แบบฝึกหัด</h5>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6"><a href="vdo.php">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3">
                        <img src="assets2/images/instructors.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>วิดีโอการสอน</h5>
                    </div>
                </div></a>
            </div>
        </div>
    </div>
</section>  -->
<!-- END SECTION FEATURE -->
<section >
	<!-- <div class="container">	 -->
    <div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center" >
                        <h2>ไลฟ์สตรีม     </h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
<!-- START SECTION ABOUT -->
<section class="small_pt small_pb overflow-hidden">
	<div class="container-fluid p-0">
    	<div class="row no-gutters align-items-center">
        	<div class="col-md-6">
            	<div class="box_shadow1 bg-white overlap_section padding_eight_all">
                	<div class="animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                        <div class="heading_s1"> 
                          <h2>About Us</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <ul class="list_none list_item">
                        	<!-- <li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_danger"><span class="counter">260</span></h3>
                                    <h6>Free Courses</h6>
                                </div>
                            </li>
                            <li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_light_green"><span class="counter">152</span></h3>
                                    <h6>Paid Courses</h6>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        	<div class="col-md-6">
            	<div class="animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                	<div class="overlay_bg_30 about_img z_index_minus1">	
                    	<img class="w-100" src="assets2/images/about_img.jpg" alt="about_img"/>
                    </div>
                	<a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video_popup video_play">
                    	<span class="ripple"><i class="ion-play ml-1"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION ABOUT -->

</div>
       <!-- <button type="button" class="btn btn-primary" style="margin-right: 2cm;">พิมพ์รายงาน</button> -->
</section>



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