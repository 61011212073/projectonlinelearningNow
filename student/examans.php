<?php
    session_start();
    if (!isset($_SESSION['student_username'])) {
      header('location: ../login.html');
    }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['student_username']);
      unset($_SESSION['study_coursesopen_id']);
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

    $std_id=mysqli_fetch_assoc(mysqli_query($conn,$sql2));

    mysqli_query($conn,"SET CHARACTER SET UTF8");

     $subject=$_GET['exam'];
    // $sql2="SELECT * FROM document ORDER BY document_id DESC "; //เรียงลำดับจากมากไปน้อย
    $sql="SELECT subject.subject_id,subject.subject_engname,exampapers.exampapers_category 
    FROM exampapers 
    INNER JOIN coursesopen ON exampapers.exampapers_coursesopen_id=coursesopen.coursesopen_id 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
    WHERE exampapers_id='$subject'"; 
    $result = mysqli_query($conn,$sql);

    $sql_exam;
    $examans;

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
<title>Online Education </title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="assets2/images/logo3.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="assets2/css/animate.css" />	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css" />
<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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
* {
  font-family: 'Kanit', sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.99em;
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
  padding: 30px 40px;
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
                <img  src="assets2/images/logo1.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="aboutSubject.php" style="font-family: 'Kanit', sans-serif;">รายวิชาที่ลงทะเบียน</a>
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
<section >
<font face="'Kanit', sans-serif">    
         <div class="container" align="center">   
                <h2 align="center"><b style="color:#009879;">การสอบอัตนัย</b></h2> <hr> 
                
                <div class="form-group" >  
                     <form action="" method="post">  
                          <div class="table-responsive" > 
                              <table class="content-table">
                                   <thead>
                                        <tr>
                                             <td>รหัสวิชา</td>
                                             <td>ชื่อวิชา</td>
                                             <td>สอบประจำภาคการศึกษา</td>
                                             <!-- <td>วันที่-เวลา</td> -->
                                             <td>รหัสนิสิต</td>
                                        </tr>
                                   <thead>
                                   <tbody>
                                   <?php while($row=mysqli_fetch_array($result)){ ?>
                                        <tr>
                                             <td><?php echo $row["subject_id"]?></td>
                                             <td><?php echo $row["subject_engname"]?></td>
                                             <!-- <td><?php // echo $row[""]?></td> -->
                                             <td><?php echo $row["exampapers_category"]?></td>
                                             
                                             <td><input type="text" name="examans_std_std" value="<?php echo $std_id["student_id"]?>" readonly/></td>
                                        </tr>
                                        <?php }?>
                                   </tbody>
                              <table>
                               <table class="content-table"> 
                                   <thead>
                                        <tr>
                                             <td>ลำดับ</td>
                                             <td>โจทย์</td>
                                             <td>คำตอบนิสิต</td>
                                             
                                        </tr>
                                   </thead>
                                   <tbody>
                                   
                                        {% for i in range(datas|length) %}
                                             <tr> 
                                                  <td>{{i+1}}</td>
                                                  
                                                  <td>
                                                       <input type="text" name="examans_std_examaddword" value="{{num[i]}}">
                                                  
                                                  {{datas[i].2}}
                                                  </td>
                                                  <!--<td><option name="examans_std_examaddword" value="{{num[i]}}"></option></td>-->
                                                  <td><input type="text" name="examans_std_answer" placeholder="เพิ่มคำตอบ"></td>
                                             </tr>
                                        
                                        
                                        {% endfor %}
                                   </tbody>
                               </table>  
                               <button type="submit" name="submit" id="submit" class="btn btn-success"/>ส่งคำตอบ</button>
                               <button class="btn btn-success" ><a href="/store" style="color: white;">กลับ</a></button>
                          </div>  
                     </form>  
                </div>  
           </div> 
          </font> 
       
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