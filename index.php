<?php
    require('conn.php');
    $sql = mysqli_query($conn,"SELECT COUNT(*) as totalstd FROM student");
    $result= mysqli_fetch_assoc($sql);

    $sql1 = mysqli_query($conn,"SELECT COUNT(*) as totalled FROM teacher");
    $result1= mysqli_fetch_assoc($sql1);

    $result2= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as totalop FROM coursesopen"));

    $result3= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as totalsub FROM subject"));

    $sql_news="SELECT news_name,news_detail,news_date,teacher.teacher_fname,teacher.teacher_lname 
                FROM news 
                INNER JOIN teacher ON news.news_teacher=teacher.teacher_id";
    $news=mysqli_query($conn,$sql_news);
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
<title>Online Education</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="assets1/images/logo3.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="assets1/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- Icon Font CSS -->
<link rel="stylesheet" href="assets1/css/ionicons.min.css">
<link rel="stylesheet" href="assets1/css/themify-icons.css">
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="assets1/css/all.min.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="assets1/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets1/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="assets1/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="assets1/css/magnific-popup.css">
<!-- Style CSS -->
<link rel="stylesheet" href="assets1/css/style.css">
<link rel="stylesheet" href="assets1/css/responsive.css">
<link rel="stylesheet" id="layoutstyle" href="assets1/color/theme.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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
            <a class="navbar-brand" href="index.html">
                <img  src="assets1/images/logoo.png" alt="logo" />
              
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Home</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="index.html">Home Version 1</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="index-2.html">Home Version 2</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="index-3.html">Home Version 3</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="index-4.html">Home Version 4</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="index-5.html">Home Version 5</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="index-6.html">Home Version 6</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link active" href="#" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item active" href="about.html">About Us</a></li> 
                                <li class="dropdown">
                                    <a class="dropdown-item menu-link dropdown-toggler" href="#">Gallery</a>
                                    <div class="dropdown-menu">
                                        <ul> 
                                            <li><a class="dropdown-item nav-link nav_item" href="gallery-three-columns.html">Gallery 3 Column Grid</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="gallery-four-columns.html">Gallery 4 Column Grid</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="gallery-masonry-three-columns.html">Gallery 3 Column Masonry</a></li> 
                                            <li><a class="dropdown-item nav-link nav_item" href="gallery-masonry-four-columns.html">Gallery 4 Column Masonry</a></li> 
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="dropdown-item nav-link nav_item" href="faq.html">Faq</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="404.html">404 Page</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Course</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="courses.html">Courses</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="course-detail.html">Course Detail</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Event</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="event.html">Event</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="event-detail.html">Event Detail</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Teacher</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="teacher.html">Teacher</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="teacher-detail.html">Teacher Detail</a></li>
                            </ul>
                        </div>
                    </li>-->
                   
                    <li>
                        <a class="nav-link" href="login.html" style="font-family: 'Kanit', sans-serif;">เข้าสู่ระบบ</a>
                    </li> 
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="registerstd.php" style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก นิสิต</a></li> 
                                <li><a class="dropdown-item nav-link nav_item" href="registerled.php" style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก อาจารย์</a></li>
                            </ul>
                        </div>
                    </li> 
                    <!-- <li>
                        <a class="nav-link" href="register.html">Register</a>
                    </li> -->
                    
                </ul>
            </div>
           <!-- <ul class="navbar-nav attr-nav align-items-center">
                 <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="ion-ios-search-strong"></i></a>
                    <div class="search-overlay">
                        <div class="search_wrap">
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                </li> 
            </ul>-->
        </nav>
    </div>
</header>
<!-- END HEADER --> 

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets1/images/44.png">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title" >
            		<h1>WELCOME</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="login.html" style="font-family: 'Kanit', sans-serif;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#" style="font-family: 'Kanit', sans-serif;">Dashboard</a></li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->


<!-- START SECTION COUNTER style="background-color: #E5E0E0"-->
<section class="bg_gray" >
    <div class="container ">
        <div class="row ">
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="counter_icon box_icon bg_danger mb-3">
                    <img src="assets1/images/students1.png" alt="book" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter"><?php echo $result['totalstd']; ?></span></h3>
                        <div class="intro_desc">
                        <h5>นิสิต</h5>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="counter_icon box_icon bg_light_green  mb-3">
                        <img src="assets1/images/isub.png" alt="book" >
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter"><?php echo $result2['totalop']; ?></span></h3>
                        <div class="intro_desc">
                        <h5>รายวิชาที่เปิดสอน</h5>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <div class="counter_icon box_icon bg_default mb-3">
                    	<img src="assets1/images/teacher.png" alt="counter_icon3" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter"><?php echo $result1['totalled']; ?></span></h3>
                        <div class="intro_desc">
                        <h5>อาจารย์</h5>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                	<div class="counter_icon  box_icon bg_pink mb-3">
                    	<img src="assets1/images/bookN.png" alt="counter_icon4" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter"><?php echo $result3['totalsub']; ?></span></h3>
                        <div class="intro_desc">
                        <h5>รายวิชา</h5>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

<!-- END SECTION COUNTER -->
 
 <!-- START SECTION TESTIMONIAL style="background-color: #E5E0E0"-->
<section class="bg_gray" >
	<div class="container" >
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 style="font-family: 'Kanit', sans-serif;">ข่าวสาร</h2>
                    </div>
                    <div class="small_divider"></div>
                </div>
            </div>
            
            <div class="testimonial_box ">
                <hr>
                <?php while($row=mysqli_fetch_array($news)){ ?>
                    <div class="testimonial_img">
                        <img class="radius_all_5 " src="assets1/images/newnews.png" alt="client" width="50" height="50">
                    </div>
                    <div class="testi_meta">
                        <div class="testi_user">
                            <h6 style="font-family: 'Kanit', sans-serif;"><?php echo $row["news_name"];?></h6>
                            <span class="text_black" style="font-family: 'Kanit', sans-serif;"><?php echo $row["teacher_fname"]." ".$row["teacher_lname"];?></span>
                        </div>
                        <div class="testi_desc">
                            <p style="font-family: 'Kanit', sans-serif;"><?php echo $row["news_detail"]?></p>
                        </div>
                    </div><hr>
                <?php } ?>
            </div>
            <br>
           
            <!-- <div class="testimonial_box">
                <div class="testimonial_img">
                    <img class="radius_all_5" src="assets1/images/rr.png" alt="client" width="50" height="50">
                </div>
                <div class="testi_meta">
                    <div class="testi_user">
                        <h6>Foundation</h6>
                        <span class="text_default">Dr.Jantima</span>
                    </div>
                    <div class="testi_desc">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, quaeillo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="testimonial_box">
                <div class="testimonial_img">
                    <img class="radius_all_5" src="assets1/images/rr.png" alt="client" width="50" height="50">
                </div>
                <div class="testi_meta">
                    <div class="testi_user">
                        <h6>Foundation</h6>
                        <span class="text_default">Dr.Jantima</span>
                    </div>
                    <div class="testi_desc">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, quaeillo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div> -->
        </div>
        
       
    </div>
</section>
<!-- END SECTION TESTIMONIAL -->


<!-- START FOOTER -->
<footer class="bg-dark footer_dark" style="font-family: 'Kanit', sans-serif;">
	<div class="top_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-8 mb-4 mb-lg-0">
                	<div class="footer_logo">
                    <!-- <a class="navbar-brand" href="index.html">
                      <img  src="assets1/images/logoo.png" alt="logo" />
                    
                  </a> -->
                    </div>
                    <p>นายธนายุทธ กลิ่นศรีสุข</p>
                    <p>นายอดิศร ศรีสุภผลโภชน์</p>
                    <ul class="contact_info contact_info_light list_none">
                        <li>
                            <i class="fa fa-map-marker-alt "></i>
                            <address>คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</address>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:61011212041@msu.ac.th">61011212041@msu.com</a>
                        </li>
                        <li>
                          <i class="fa fa-envelope"></i>
                          <a href="mailto:61011212073@msu.ac.th">61011212073@msu.com</a>
                      </li>
                        <li>
                            <i class="fa fa-mobile-alt"></i>
                            <p>+66 95 541 8854</p>
                        </li>
                        <li>
                          <i class="fa fa-mobile-alt"></i>
                          <p>+66 64 452 0493</p>
                      </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4 mb-lg-0">
                	<h6 class="widget_title">Useful Links</h6>
                    <ul class="list_none widget_links links_style1">
                    	<li><a href="login.html">Login</a></li>
                        <li><a href="login.html">Sign Up</a></li>
                        <li><a href="contach.html">About Us</a></li>
                        <!-- <li><a href="#">Feedback</a></li>
                        <li><a href="#">Support center</a></li>
                        <li><a href="#">Contact Us</a></li> -->
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                	<h6 class="widget_title">Recent Posts</h6>
                    <ul class="recent_post border_bottom_dash list_none">
                    	<li>
                        	<div class="post_footer">
                            	<div class="post_img">
                                	<a href="#"><img src="assets1/images/letest_post1.jpg" alt="letest_post1"></a>
                                </div>
                                <div class="post_content">
                                	<h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                    <span class="post_date">April 14, 2018</span>
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="post_footer">
                            	<div class="post_img">
                                	<a href="#"><img src="assets1/images/letest_post2.jpg" alt="letest_post1"></a>
                                </div>
                                <div class="post_content">
                                	<h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                    <span class="post_date">April 14, 2018</span>
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="post_footer">
                            	<div class="post_img">
                                	<a href="#"><img src="assets1/images/letest_post3.jpg" alt="letest_post1"></a>
                                </div>
                                <div class="post_content">
                                	<h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                    <span class="post_date">April 14, 2018</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h6 class="widget_title">Subscribe Newsletter</h6>
                    <p>Contrary to popular belief of lorem Ipsm Latin amet ltin from consectetur industry.</p>
                    <div class="newsletter_form mb-4">
                        <form> 
                            <input type="text" class="form-control" required="" placeholder="Email Address">
                            <button type="submit" title="Subscribe" class="btn btn-default btn-sm" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                    <h6 class="widget_title">Follow Us</h6>
                    <ul class="list_none social_icons radius_social social_white social_style1">
                    	<li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer bg_black">
    	<div class="container">
        	<div class="row align-items-center">
            	<div class="col-md-6">
                	<p class="copyright m-md-0 text-center text-md-left">© 2018 All Rights Reserved by Eduglobal.</p>
                </div>
                <div class="col-md-6">
                	<ul class="list_none footer_link text-center text-md-right">
                    	<li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="assets1/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="assets1/js/jquery-ui.js"></script>
<!-- popper min js --> 
<script src="assets1/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets1/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="assets1/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="assets1/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="assets1/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="assets1/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="assets1/js/jquery.countdown.min.js"></script> 
<!-- jquery.counterup.min js --> 
<script src="assets1/js/jquery.counterup.min.js"></script>
<!-- imagesloaded js --> 
<script src="assets1/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="assets1/js/isotope.min.js"></script>
<!-- jquery.parallax-scroll js -->
<script src="assets1/js/jquery.parallax-scroll.js"></script>
<!-- scripts js --> 
<script src="assets1/js/scripts.js"></script>

</body>
</html>