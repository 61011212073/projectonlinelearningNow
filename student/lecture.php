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

    mysqli_query($conn,"SET CHARACTER SET UTF8");
    // $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen INNER JOIN subject ON coursesopen.coursesopen_id=subject.subject_id";
    // $result = mysqli_query($conn,$sql);


     $subject=$_GET['subject'];
    // $sql2="SELECT * FROM document ORDER BY document_id DESC "; //เรียงลำดับจากมากไปน้อย
    $sql="SELECT * FROM work WHERE work_courseopen_id ='$subject'"; //แบบปกติ
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
	<div class="container">	
    <div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center" >
                        <h2>แบบฝึกหัด</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
    	<!-- <div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2 style="font-family: 'Kanit', sans-serif;">วิดีโอประกอบการสอน</h2>
                    </div>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div> -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มแบบฝึกหัด
              </button>
              
              Modal
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > ข้อมูลแบบฝึกหัด</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate>
                        <label for="validationCustom01" class="form-label" >รายวิชา</label>
                        <select class="form-select form-control" aria-label="Default select example">
                            <option selected>เลือกรายวิชา</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                          
                     
                        <div >
                            <label for="validationCustom01" class="form-label" >ชื่อแบบฝึกหัด</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกชื่อแบบฝึกหัด" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                          <div >
                          <label for="formFile" class="form-label">ไฟล์แบบฝึกหัด</label>
                          <input class="form-control" type="file" id="formFile">

                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                          
                        <div class="col-12">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                  </div>
                </div>
              </div>
        </div> -->
        <br>
        <div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">ลำดับ</th>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">ชื่อแบบฝึกหัด</th>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">ไฟล์แบบฝึกหัด</th>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">วันที่สั่งงาน</th>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">วันที่ส่งงาน</th>
      <th scope="col" style="font-family: 'Kanit', sans-serif;">การส่งงาน</th>
      <!-- <th scope="col">ดูการส่งงาน</th> -->

    </tr>
  </thead>
  <tbody>
  <?php $i=0; while($row = mysqli_fetch_array($result)){ $i=$i+1 ?>
    <tr>
      <th scope="row" style="font-family: 'Kanit', sans-serif;"><?php echo $i;?></th>
      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row["work_name"];?></td>
      <td style="font-family: 'Kanit', sans-serif;"><a href="../uploadwork/<?=$row["work_file"]?>" style="color:blue; font-family: 'Kanit', sans-serif;"><?php echo $row["work_file"];?></a></td>
      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row["work_date"];?></td>
      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row["work_enddate"];?></td>
      <td>
          <button type="button" name="edit"  id="<?php echo $row["work_id"]; ?>" class="btn btn-info btn-xs edit_data"><i class='fas fa-edit'></i></button>
      </td>  
      <!-- <td>
      <a class="btn btn-primary" href="sentlecture.php" role="button"> <i class="fa fa-clipboard"></i></a>
     
      </td> -->
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
       
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
<script>  
$(document).ready(function(){  
   
    $(document).on('click', '.edit_data', function(){  
         var employee_id = $(this).attr("id");  
         if(employee_id != '')  
         {  
              $.ajax({  
                   url:"../BasicData/course/select.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                   success:function(data){  
                        $('#employee_detail').html(data);  
                        $('#dataModal').modal('show');  
                   }  
              });  
         }            
    });  
});  
</script>
</body>
</html>
<div id="dataModal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
    <div class="modal-dialog">  
         <div class="modal-content">  
              <div class="modal-header">  
                   <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                   <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลหลักสูตร</h4>  
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>  
              <div class="modal-body" id="employee_detail">  
              </div>  
             
         </div>  
    </div>  
</div>  