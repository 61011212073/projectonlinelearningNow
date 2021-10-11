<?php
  session_start();
  if (!isset($_SESSION['teacher_username'])) {
    header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['teacher_username']);
    header('location: ../index.php');
  }
  require("conn.php");
  $username=$_SESSION['teacher_username'];
  $sql2="SELECT teacher.teacher_id,prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id 
  INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id 
  WHERE teacher_username='$username'";
  $result2=mysqli_query($conn,$sql2);

  $work=$_GET["work"];

  $send_work="SELECT sendwork.sendwork_id,sendwork.sendwork_student_id,sendwork.sendwork_datetime,student.student_id,student.student_fname,student.student_lname,sendwork.sendwork_sendwork 
  FROM sendwork
  INNER JOIN work ON sendwork.sendwork_workorder=work.work_id
  INNER JOIN student ON sendwork.sendwork_student_id=student.student_id
  WHERE work.work_id='$work'";
  $send=mysqli_query($conn,$send_work);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Online Education System</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
  <link href='../src/vendor/normalize.css/normalize.css' rel='stylesheet'>
  <link href='../src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href="../dist/vertical-responsive-menu.min.css" rel="stylesheet">
  <link href="Prename.css" rel="stylesheet">
  <!-- <link href="../dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
  <link href="../demo/style.css" rel="stylesheet">
  <script src="../demo/main.js"></script>
  
  


 
</head>
<style>
  .font-color{
    color: #081c15;
  }
</style>

<body style="font-family: 'Kanit', sans-serif;">

  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars" style="color: white;"></i>
    </button>
    <h1 style="color: white;">Online Education System</h1>
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fas fa-door-open"></i>
    </button>
   
  </header>
  <section >
	<div class="container">	
    <div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center" >
                        <h2 style="margin-top: 20px;">การส่งงาน</h2>
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
        
             
        <br>
        <div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">รหัสนิสิต</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">วันที่และเวลาที่ส่ง</th>
      <th scope="col">งานที่ส่ง</th>
      <!-- <th scope="col">คะแนนที่ได้</th> -->

    </tr>
  </thead>
  <tbody>
    <?php $i=0; while($row=mysqli_fetch_array($send)){ $i+=1;?>
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $row["student_id"]?></td>
      <td><?php echo $row["student_fname"]." ".$row["student_lname"]?></td>
      <td><?php echo $row["sendwork_datetime"]?></td>
      <!-- <td>15</td> -->
      <td><a href="../uploadsend/<?=$row["sendwork_sendwork"]?>">ดาวน์โหลด</a></td> 
    </tr>
   <?php } ?>
  </tbody>
</table>
</div>
       <button type="button" class="btn btn-primary" style="margin-right: 2cm;">พิมพ์รายงาน</button>
</section>
  
  
  


 

   
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>