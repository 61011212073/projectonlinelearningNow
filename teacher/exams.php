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

     mysqli_query($conn,"SET CHARACTER SET UTF8");
     $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
     FROM coursesopen 
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
     INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id";
     $result = mysqli_query($conn,$sql);
    
     $exams=$_GET["exam"];
    //  echo $exams;

     $sql_exam="SELECT subject.subject_engname,examAddwords_id,exampapers.exampapers_name,examAddwords_question,examAddwords_answer,examAddwords_fullscore,examAddwords_keyword
     FROM examaddwords
     INNER JOIN exampapers ON examaddwords.examAddwords_exampapers_id=exampapers.exampapers_id
     INNER JOIN coursesopen ON exampapers.exampapers_coursesopen_id=coursesopen.coursesopen_id
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
     WHERE exampapers_id='$exams'";
     $exam=mysqli_query($conn,$sql_exam);

     $sub=mysqli_fetch_assoc(mysqli_query($conn,"SELECT subject.subject_engname,examAddwords_id,exampapers.exampapers_name,examAddwords_question,examAddwords_answer,examAddwords_fullscore,examAddwords_keyword
     FROM examaddwords
     INNER JOIN exampapers ON examaddwords.examAddwords_exampapers_id=exampapers.exampapers_id
     INNER JOIN coursesopen ON exampapers.exampapers_coursesopen_id=coursesopen.coursesopen_id
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
     WHERE exampapers_id='$exams'"));
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Online Education </title>
    <link rel="stylesheet" href="menu/menu.css">
    <link rel="shortcut icon" type="image/x-icon" href="../assets1/images/logo3.png">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="../demo/style.css" rel="stylesheet">
     <script src="../demo/main.js"></script>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
        position: center;
	}
	.table-wrapper {
		width: 1500px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 24px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
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
          <li><a class="link_name" href="hometeacher1.php" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
          <li><a href="opensubject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="addstudentinsubject.php" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="../adddocument.php" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="../addvdo.php" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="../addexam.php" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="addstream.php" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="exampaper.php" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ตรวจข้อสอบ</a></li>
          <li><a href="news.php" style="font-family: 'Kanit', sans-serif;">- ข่าวสาร</a></li>
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
      <?php while($row=mysqli_fetch_array($result2)){ ?>
    <a href="editprofile.php">
      <div class="name-job">
        <div class="profile_name" style="font-family: 'Kanit', sans-serif; font-size: 14px;"><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></div>
        <div class="job" style="font-family: 'Kanit', sans-serif;">Teacher</div>
      </div>
    </a>
      <?php }?>
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
  <div class="wrapper">

    <section>
      <div class="container-fluid">
        <h3>ตารางแสดงข้อสอบ</h3>
              <br>
           
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>ข้อสอบวิชา 
                      <b><?php //
                            if (!isset($sub["subject_engname"])) {
                              echo "ไม่มีชื่อรายวิชา";
                            }
                            else{
                              echo $sub["subject_engname"];
                            }
                      
                      ?></b>
                    </h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>ลำดับ</th>
                          <th>โจทย์</th>
                          <th>คำตอบ</th>
                          <th>คะแนน</th>
                          <th>คำสำคัญ</th>
                          <th>ตัวเลือก</th>
                      </tr>
                  </thead>
                  <tbody >
                    <?php $i=0; while($row=mysqli_fetch_array($exam)){ $i=$i+1;?>
                      <tr >
                          <td><?php echo $i;?></td>
                          <td><?php echo $row["examAddwords_question"];?></td>
                          <td><?php echo $row["examAddwords_answer"];?></td>
                          <td><?php echo $row["examAddwords_fullscore"];?></td>
                          <td><?php echo $row["examAddwords_keyword"];?></td>
                          <td>
                          
                          </td>
                      </tr>
                      <?php }?>
                  </tbody>
              </table><hr>
            <form action="Add/addexam.php?exampaper=<?php echo $exams?>" method="post">
              <table class="table table-bordered" id="myTbl">
                  <thead>
                      <tr>
                          <th>โจทย์</th>
                          <th>คำตอบ</th>
                          <th>คะแนน</th>
                          <th>คำสำคัญ</th>
                          <th>ตัวเลือก</th>
                      </tr>
                  </thead>
                  <tbody >
                      <tr id="firstTr">
                        <td width="519"><input type="text" name="data1[]" id="data1[]" required /></td>
                        <td width="519"><input type="text" name="data2[]" id="data2[]" required /></td>
                        <td width="519"><input type="text" name="data3[]" id="data3[]" required /></td>
                        <td width="519"><input type="text" name="data4[]" id="data4[]" required /></td>
                      </tr>
                  </tbody>
              </table>
            
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i>เพิ่มโจทย์</button> -->
                        <button id="removeRow" class="btn btn-danger add-new" type="button"><i class="fa fa-delete"></i>-</button>
                         
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="addRow" class="btn btn-info add-new" type="button"><i class="fa fa-plus"></i></button> 
                        <button id="submit" class="btn btn-info add-new" type="submit">เพิ่มโจทย์</button> 
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
              
            </section>
            
            <br>
            <br>
          
                  </section>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script type="text/javascript">
    $(function(){
        $("#addRow").click(function(){
            $("#myTbl").append($("#firstTr").clone());
        });
        $("#removeRow").click(function(){
            if($("#myTbl tr").size()>2){
                $("#myTbl tr:last").remove();
            }else{
                alert("ต้องมีข้อสอบอย่างน้อย 1 ข้อ");
            }
        });          
    });
    </script>
<script src="menu/script.js"></script>

</body>
</html>
</html>