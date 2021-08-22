<?php
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen INNER JOIN subject ON coursesopen.coursesopen_id=subject.subject_id";
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
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;" >เกี่ยวกับนักเรียน</a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">แบบฝึกหัด</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">วิดีโอการสอน</a>
                    </li> -->
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" style="font-family: 'Kanit', sans-serif;">username</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">ข้อมูลส่วนบุคคล</a></li> 
                                <!-- <hr> -->
                                <li><a class="dropdown-item nav-link nav_item" href="#" style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </li> 
                    <!-- <li>
                        <a class="nav-link" href="#" style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</a>
                    </li> -->
                </ul>
            </div>
            
        </nav>
    </div>
</header>
<!-- END HEADER -->  

<!-- START SECTION BANNER -->
<!-- <section class="banner_section p-0 full_screen">
    <div id="carouselExampleFade" class="banner_content_wrap carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg overlay_bg_40" data-img-src="assets2/images/e.png">
                <div class="banner_slide_content">
                    <div class="container">
                   
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-sm-12 text-center">
                            <div class="banner_content animation text_white" data-animation="fadeIn" data-animation-delay="0.8s">
                                <h2 class="font-weight-bold animation text-uppercase" data-animation="fadeInDown" data-animation-delay="1s" style="color:orange">Mahasakham University</h2>
                                <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">Mahasarakham University It is the top 10 ranked university in the country and is recognized. It is the number 1 community university in the Northeast..</p>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_40" data-img-src="assets2/images/r.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                       
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-sm-12 text-center">
                                <div class="banner_content animation text_white" data-animation="fadeIn" data-animation-delay="0.8s">
                                    <h2 class="font-weight-bold animation text-uppercase" data-animation="fadeInDown" data-animation-delay="1s" style="color:orange">welcome ceremony</h2>
                                    <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">
                                        Isan people's way of life and beliefs In calling for the prosperity of the participants of the activity</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_40" data-img-src="assets2/images/n.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-sm-12 text-center">
                                <div class="banner_content animation text_white" data-animation="fadeIn" data-animation-delay="0.8s">
                                    <h2 class="font-weight-bold animation text-uppercase" data-animation="fadeInDown" data-animation-delay="1s" style="color:orange">MSU FRESHY DAY & FRESHY NIGHT</h2>
                                    <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">New students receive a good reception and receive encouragement from current students. In addition, to create participation in creating creative activities for senior students in each faculty / college.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-nav carousel_style1">
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <i class="ion-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <i class="ion-chevron-right"></i>
            </a>
        </div>
    </div>
</section> -->
<!-- END SECTION BANNER -->

<!-- START SECTION CATEGORIES 
<section class="small_pb">
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 style="font-family: 'Kanit', sans-serif;">เกี่ยวกับข้อสอบ</h2>
                    </div>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="course_categories carousel_slider owl-carousel owl-theme nav_style1" data-margin="15" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "1199":{"items": "2"}}'>
                
                    <div class="item" style="font-family: 'Kanit', sans-serif;">
                    	<div class="single_categories">
                        	<a href="addExam.php" class="bg_light_green" style="font-family: 'Kanit', sans-serif;">
                            	<i class="fas fa-book-reader"></i>
                            	การเพิ่มข้อสอบอัตนัย
                            </a>
                        </div>
                    </div>
                   
                    <div class="item">
                    	<div class="single_categories">
                        	<a href="checkExam.php" class="bg_pink" style="font-family: 'Kanit', sans-serif;">
                            	<i class="far fa-edit"></i>
                            	การตรวจข้อสอบอัตนัย
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- END SECTION CATEGORIES -->



<!-- START SECTION BLOG -->
<section class="bg_gray">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                	<h2 style="font-family: 'Kanit', sans-serif;"  >รายวิชาที่ลงทะเบียน</h2>
                </div>
            </div>
        </div>
        <!-- <div class="col-12">
            	<div class=" animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="medium_divider"></div>
                	<a href="addsubject.php" class="btn btn-default" style="font-family: 'Kanit', sans-serif; margin-left: 0px" >เพิ่มรายวิชา<i class="ion-ios-plus-thin-right ml-1"></i></a>
                </div>
            </div> -->
        <div class="row">
        	
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-md-6">
            	<div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="blog_img radius_ltrt_10">
                        <a href="homelec.php">
                            <img src="assets2/images/ss.jpg" alt="blog_small_img1">
                            <div class="link_blog">
                            	<span class="ripple"><i class="fa fa-link"></i></span>
                            </div>
                        </a>
                    </div>
                    <font style="font-family: 'Kanit', sans-serif;">
                        <div class="blog_content bg-white" >
                            <h6 class="blog_title"><a href="homelec.php" style="font-family: 'Kanit', sans-serif; height: 40px;">Problem Solving for Computer Science</a></h6>
                            <p style="font-family: 'Kanit', sans-serif; height: 120px;">การวิเคราะห์ปัญหา การแสดงขั้นตอนวิธีแบบรหัสเทียม การแสดงขั้นตอนวิธีแบบผังงาน นิพจน์ การคำนวณ และเปรียบเทียบทางคอมพิวเตอร์ ข้อมูล </p>
                            
                        </div>
                    </font>
                    <div class="blog_footer bg-white radius_lbrb_10">
                        <ul class="list_none blog_meta">
                            <li><a href="#" style="font-family: 'Kanit', sans-serif;"><i class="ion-calendar"></i>John Woo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                	<div class="blog_img radius_ltrt_10">
                        <a href="homelec.php">
                            <img src="assets2/images/ss2.jpg" alt="blog_small_img2">
                            <div class="link_blog">
                            	<span class="ripple"><i class="fa fa-link"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <h6 class="blog_title"><a href="homelec.php" style="font-family: 'Kanit', sans-serif; height: 40px;">Foundation of Computer Science</a></h6>
                        <p style="font-family: 'Kanit', sans-serif; height: 120px;">วิวัฒนาการ ความสามารถ ประเภทและโครงสร้างของคอมพิวเตอร์ การทำงานของคอมพิวเตอร์ ระบบเลขจำนวน พีชคณิตบูลีน ข้อมูล และระบบสารสนเทศ การแทนค่าข้อมูล การประมวลผลข้อมูล</p>
                        
                    </div>
                    <div class="blog_footer bg-white radius_lbrb_10">
                        <ul class="list_none blog_meta">
                            <li><a href="#" style="font-family: 'Kanit', sans-serif;"><i class="ion-calendar"></i>John Woo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="blog_img radius_ltrt_10">
                        <a href="homelec.php">
                            <img src="assets2/images/s1.jpg" alt="blog_small_img3">
                            <div class="link_blog">
                            	<span class="ripple"><i class="fa fa-link"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <h6 class="blog_title"><a href="#" style="font-family: 'Kanit', sans-serif; height: 40px;">Calculus for Computer Science</a></h6>
                        <p style="font-family: 'Kanit', sans-serif; height: 120px;">ทฤษฎีเซต ฟังก์ชัน และความสัมพันธ์ จำนวนธรรมชาติ อุปนัยเชิงคณิตศาสตร์ และขนาดของเซต จำนวนจริง สมการกำลัง ลิมิต ลำดับ อนุพันธ์ อินทิกรัล ฟังก์ชันตรีโกณมิติ</p>
                        
                    </div>
                    <div class="blog_footer bg-white radius_lbrb_10">
                        <ul class="list_none blog_meta">
                            <li><a href="#" style="font-family: 'Kanit', sans-serif;"><i class="ion-calendar"></i>John Woo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
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