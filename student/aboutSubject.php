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
      header('location: ../index.php');
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
    $sql="SELECT study.study_coursesopen_id,subject.subject_id,subject.subject_engname,subject.subject_detail_thai,teacher.teacher_fname,teacher.teacher_lname 
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
<title>Online Education</title>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .columns {
    column-count: 3;
    column-rule: 2px solid #ddd;
    -moz-column-count: 5;
    -webkit-column-count: 3;
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
                <img  src="../assets1/images/logoo.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
                <li>
                        <a class="nav-link" href="aboutSubject.php?subject='1'" style="font-family: 'Kanit', sans-serif;">รายวิชาที่ลงทะเบียน</a>
                    </li>
                    <!-- <li>
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
<!-- START SECTION BLOG style="background-color: #E5E0E0"-->
<section class="bg_gray" >
	<div class="container">
    	<div class="row">

        <!-- Profile -->
        <!-- <link rel="stylesheet" href="assets2/css/profile.css" /> -->
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
              <div class="card " >
                <div class="card-body blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="profileImg" width="110">
                    <div class="mt-3">
                    <?php while($rows=mysqli_fetch_array($result3)){ ?>
                      <h4><?php echo $rows['student_fname'];?> <?php echo $rows['student_lname'];?></h4>
                     
                      <p class="text-secondary mb-1" style="font-family: 'Kanit', sans-serif;"><?php echo $rows['department_name'];?></p>
                      <p class="text-muted font-size-sm" style="font-family: 'Kanit', sans-serif;"><?php echo $rows['faculty_name'].' '.$rows['univercity_thname'];?></p>
                       <?php }?>
                      <div class="col-sm-12">
                      <a class="btn btn-info "  href="editProfile.php" style="font-family: 'Kanit', sans-serif;">Edit</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary" style="font-family: 'Kanit', sans-serif;">ต้าเก้ออออออ</span>
                  </li>
                </ul>
              </div> -->
            </div>
            <?php while($row=mysqli_fetch_array($result4)){ ?>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">รหัสนิสิต</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['student_id'];?>
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">คำนำหน้าชื่อ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php //echo $row['preName_name'];?>
                    </div>
                  </div>
                  <hr> -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ชื่อ-นามสกุล</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['preName_name'].' '.$row['student_fname'].' '.$row['student_lname'];?>
                    </div>
                  </div>
                  <!-- <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">นามสกุล</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php //echo $row['student_lname'];?>
                    </div>
                  </div> -->
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">เบอร์โทรศัพท์</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['student_phone'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">เฟสบุ๊ค</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <a href="<?php echo $row['student_facebook'];?>" style="font-family: 'Kanit', sans-serif;"><?php echo $row['student_facebook'];?></a>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">อีเมล</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['student_email'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">มหาวิทยาลัย</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['univercity_thname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ภาควิชา</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['faculty_name'].' '.$row['department_name'];?>
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ภาควิชา</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php //echo $row['department_name'];?>
                    </div>
                  </div>
                  <hr> -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ชื่อผู้ใช้(username)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['student_username'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">รหัสผ่าน(password)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $row['student_password'];?>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <?php } ?>
          </div>

        </div>
        <br><br>

          <!-- ------------------------------------------------------------------------------------------------------------- -->
          <div class="col-md-12">
            	<div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                	<h2 style="font-family: 'Kanit', sans-serif;">ตารางกิจกรรม</h2>
                </div>
            </div>
            <br> 
<table class="table">
  <tbody>
    <tr class="table-warning">
      <th scope="col">รายการกิจกรรมที่ต้องทำ</th>
      <th scope="col">วันที่และเวลาไลฟ์สตรีม</th>
      <th scope="col">วันที่และเวลาสอบกลางภาค</th>
      <th scope="col">วันที่และเวลาสอบปลายภาค</th>
    </tr>
    <tr>
      <td>Foundation of Computer Science</td>
      <td>-</td>
      <td>-</td>
      <td>27/10/64 - 15.00</td>
    </tr>
    
  </tbody>
</table>

<hr>
<br>


        <!-- ------------------------------------------------------------------------------------------------------------- -->
        	<div class="col-md-12">
            	<div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                	<h2 style="font-family: 'Kanit', sans-serif;">รายวิชาที่ลงทะเบียน</h2>
                </div>
            </div> 
          <div class="row"> 
            <div class="row justify-content-center">
              <?php while($row=mysqli_fetch_array($result)){ ?>
        	    <div class="col-6 col-md-4">
            	    <div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	      <div class="blog_img radius_ltrt_10">
                          <a href="homelec.php">
                            <!-- <img src="assets2/images/ss.jpg" alt="blog_small_img1"> -->
                            <div class="link_blog">
                            	<span class="ripple"><i class="fa fa-link"></i></span>
                            </div>
                          </a>
                        </div>
                        <font style="font-family: 'Kanit', sans-serif;">
                          <div class="blog_content bg-white" >
                            <?php $subject=$row['study_coursesopen_id']; $_SESSION['study_coursesopen_id']=$subject; ?>
                            <h6 class="blog_title"><a href="homelec.php?subb=<?php echo $subject?>" style="font-family: 'Kanit', sans-serif; height: 40px; "><?php echo $row['subject_id']?></a></h6>
                            <h6 class="blog_title"><a href="homelec.php?subb=<?php echo $subject?>" style="font-family: 'Kanit', sans-serif; height: 40px;"><?php echo $row['subject_engname']?></a></h6>
                            <p style="font-family: 'Kanit', sans-serif; height: 120px;"><?php echo $row['subject_detail_thai'];?></p>
                           </div>
                        </font>
                        <div class="blog_footer bg-white radius_lbrb_10">
                              <ul class="list_none blog_meta">
                                  <li><a href="#" style="font-family: 'Kanit', sans-serif;"><i class="ion-calendar"></i><?php echo $row['teacher_fname']; ?> <?php echo $row['teacher_lname'];?></a></li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
            	    <div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	      
                        <font style="font-family: 'Kanit', sans-serif; ">
                          <div class="blog_content bg-white columns">
                            <?php 
                                $sql3="SELECT * FROM document WHERE document_status=1 AND document_coursesopen_id=".$row['study_coursesopen_id'];
                                $resultdocument=mysqli_query($conn,$sql3);
                                
                                $sql_vdo="SELECT * FROM vdo WHERE vdo_coursesopen_id =".$row['study_coursesopen_id'];
                                $vdo=mysqli_query($conn,$sql_vdo);

                                $sql_live="SELECT * FROM live WHERE live_coursesopen_id =".$row['study_coursesopen_id'];
                                $live=mysqli_query($conn,$sql_live);
                                
                                $sql_work="SELECT * FROM work WHERE work_status=1 AND work_courseopen_id =".$row['study_coursesopen_id'];
                                $work=mysqli_query($conn,$sql_work);


                                $resultdoc= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as countdoc FROM document WHERE document_coursesopen_id =".$row['study_coursesopen_id']));
                                $resultvdo= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as countvdo FROM vdo WHERE vdo_coursesopen_id =".$row['study_coursesopen_id']));
                                // $resultlive= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as countlive FROM live WHERE live_coursesopen_id =".$row['study_coursesopen_id']));
                                $resultwork= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as countwork FROM work WHERE work_courseopen_id =".$row['study_coursesopen_id']));
                            
                            ?>
                            <!-- ========================================================================================================================================================== -->
                            <h6 class="blog_title"><a  style="font-family: 'Kanit', sans-serif;">เอกสารประกอบการสอนล่าสุด</a></h6>
                            <p>
                              <?php 
                                    if ($resultdoc['countdoc']>=1 && $resultdoc['countdoc']<=5) {
                                      while ($document=mysqli_fetch_array($resultdocument)) {
                              ?>
                                                <a href="../uploadbook/<?=$document["document_file"]?>" style="font-family: 'Kanit', sans-serif; height: 40px;">
                                                  <i class="fa fa-file-pdf-o" style="font-size:24px;  color:red; " ></i><?php echo ' '.$document["document_name"] ?>
                                                </a><br>
                              <?php
                                      
                                      }
                                    }
                                    else if($resultdoc['countdoc']>5){

                                    }
                                    else{
                                      echo "<h6 style='font-family: 'Kanit', sans-serif;'> ยังไม่มีข้อมูล </h6>";
                                    }
                                    
                              ?>
                            </p>
                          <!-- ========================================================================================================================================================== -->
                            <h6 class="blog_title"><a  style="font-family: 'Kanit', sans-serif; height: 40px;">วีดีทัศน์ล่าสุด</a></h6>
                            <p>
                              <?php 
                                      if ($resultvdo['countvdo']>=1 && $resultvdo['countvdo']<=5) {
                                          while ($vdo1=mysqli_fetch_array($vdo)) {
                                        
                                ?>
                                            <a href="../uploadvdo/<?=$vdo1["vdo_link"]?>" style="font-family: 'Kanit', sans-serif; height: 40px;">
                                              <i class="fa fa-file-movie-o" style="font-size:24px;  color:blue;"></i><?php echo ' '.$vdo1["vdo_name"] ?>
                                            </a><br>
                                <?php
                                        }
                                        }
                                      else if($resultvdo['countvdo']>5){

                                      }
                                      else{
                                        echo "<h6 style='font-family: 'Kanit', sans-serif;'> ยังไม่มีข้อมูล </h6>";
                                      }
                                      
                                ?>
                            </p>
                            <!-- ========================================================================================================================================================== -->
                            <h6 class="blog_title"><a  style="font-family: 'Kanit', sans-serif;">งานล่าสุด</a></h6>
                            <p>
                              <?php 
                                      if ($resultwork['countwork']>=1 && $resultwork['countwork']<=5) {
                                        while ($work1=mysqli_fetch_array($work)) {
                                ?>
                                            <a href="../uploadwork/<?=$work1["work_file"]?>" style="font-family: 'Kanit', sans-serif;">
                                            <i class="fas fa-file-alt" style="font-size:24px;  color:#f0c419;"></i><?php echo ' '.$work1["work_name"] ?>
                                            </a><br>
                                <?php
                                          }
                                        }
                                      else if($resultwork['countwork']>5){

                                      }
                                      else{
                                        echo "<h6 style='font-family: 'Kanit', sans-serif;'> ยังไม่มีข้อมูล </h6>";
                                      }
                                      
                                ?>
                            </p>
                              
                           </div>
                        </font>
                        
                    </div>
                </div>


              <?php }?>
            </div>
          </div>
            <!-- <div class="col-6 col-md-4">.col-6 .col-md-4</div>
          </div> -->
      
       
        <div class="row">
        </div>
      
        
    </div>
</section>
<br>

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