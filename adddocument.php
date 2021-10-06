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

    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname 
    FROM coursesopen 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
    INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
    WHERE teacher_username='$username'";
    $result = mysqli_query($conn,$sql);
    $result3 = mysqli_query($conn,$sql);

    $sql1="SELECT document.document_id,subject.subject_engname,document.document_name,document.document_file,document.document_datetime,document_status 
    FROM document 
    INNER JOIN coursesopen ON document.document_coursesopen_id=coursesopen.coursesopen_id 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
    INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
    WHERE teacher_username='$username' ORDER BY document_id DESC";
    $result1 = mysqli_query($conn,$sql1);

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <title> Online Education </title>
    <link rel="stylesheet" href="menu/menu.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets1/images/logo3.png">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="demo/style.css" rel="stylesheet">
     <script src="demo/main.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <script type="text/javascript">
		$(document).ready(function(){
			$("#subject").change(function(){
				var id_subject = $(this).val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: {id:id_subject,function:'subject'},
          success: function(data){
            // console.log(data);
            $('#document').html(data);
          }
				})
				})
			})
	</script>
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
        <a href="./teacher/hometeacher1.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./teacher/hometeacher1.php" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
          <li><a href="teacher/opensubject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="teacher/addstudentinsubject.php" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="adddocument.php" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="addvdo.php" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="addexam.php" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="teacher/addstream.php" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="teacher/exampaper.php" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ตรวจข้อสอบ</a></li>
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
          <li ><a href="./teacher/Prename.php" style="font-family: 'Kanit', sans-serif;">- คำนำหน้าชื่อ</a></li>
          <li><a href="./teacher/univercity.php" style="font-family: 'Kanit', sans-serif;">- มหาวิทยาลัย</a></li>
          <li><a href="./teacher/faculty.php" style="font-family: 'Kanit', sans-serif;">- คณะ</a></li>
          <li><a href="./teacher/department.php" style="font-family: 'Kanit', sans-serif;">- ภาควิชา</a></li>
          <li><a href="./teacher/course.php" style="font-family: 'Kanit', sans-serif;">- หลักสูตร</a></li>
          <li><a href="./teacher/subject.php" style="font-family: 'Kanit', sans-serif;">- รายวิชา</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
    <div class="profile-content">
        <!-- <img src="image/profile.jpg" alt="profileImg"> -->
        <img src="image/logo1.png" alt="profileImg" style="width: 55px;  height:55px;">
      </div>
      <?php while($row=mysqli_fetch_array($result2)){ ?>
    <a href="teacher/editprofile.php">
      <div class="name-job">
        <div class="profile_name" style="font-family: 'Kanit', sans-serif; font-size: 14px;"><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></div>
        <div class="job" style="font-family: 'Kanit', sans-serif;">Teacher</div>
      </div>
    </a>
      <?php }?>
      <a href="teacher/hometeacher1.php?logout='1'">
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
        <h3>ตารางแสดงเอกสารการสอน</h3>

              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลเอกสารการสอน
              </button>&nbsp;&nbsp;
              <select id="subject" class="btn btn-primary">
            <option selected disabled>-ค้นหารายวิชา-</option>
            <?php 
                  foreach ($result as $row) {
                    echo "<option value='".$row['coursesopen_id']."'>".$row['subject_engname']."</option>";
                  }
                ?>
          </select>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลเอกสารการสอน</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
            <form action="indoc.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style='font-family: Kanit, sans-serif;'>
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <select class="form-select form-control" aria-label="Default select example" name="document_coursesopen_id" style="font-family: 'Kanit', sans-serif;">
                    <option style="font-family: 'Kanit', sans-serif;">-เลือกรายวิชาที่เปิดสอน-</option>
                        <?php
                            while($rows=mysqli_fetch_row($result3)){
                                $uni_id=$rows[0];
                                $uni_name=$rows[1];
                                echo "<option value='$uni_id' style='font-family: Kanit, sans-serif;'>$uni_name</option>";
                            }
                        ?> 
                    </select>
                    <!-- <input type="text" required class="form-control" name="prename"> -->
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ชื่อหนังสือ & เอกสารประกอบการสอน :</label>
                    <input type="text" required class="form-control" name="document_name" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ไฟล์หนังสือ & เอกสารประกอบการสอน :</label>
                    <input type="file" required class="form-control" name="document_file" style="font-family: 'Kanit', sans-serif;">
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit" style="font-family: 'Kanit', sans-serif;">ยืนยัน</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: 'Kanit', sans-serif;">ปิด</button> -->
            </div>
            </form>
            </div>
                </div>
              </div>

             
              
            </section>
            <br>
            <br>
            <!-- ตารางแสดงข้อูล -->
            <table>
              <thead>
                <tr>
                  <th scope="col">ลำดับ</th>
                  <th scope="col">รายวิชา</th>
                  <th scope="col">ชื่อเอกสาร</th>
                  <th scope="col">ไฟล์เอกสารประกอบการสอน</th>
                 <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                  <th scope="col">รายละเอียด</th>
                  
                </tr>
              </thead>
              <tbody id="document">
              <tr>
              <?php $i=0;
                foreach($result1 as $row){ 
                    if ($row["document_status"]==1) {
                      $status= '<div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'" checked>
                          </div>';
                    }
                    else if ($row["document_status"]==0) {
                      $status='<div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'">
                          </div>';
                    }
                   ?> <script>
                          $(function() {
                            $('#icon<?php echo $row["document_id"];?>').change(function() {
                            var ch_val = $(this).prop('checked');
                            // var rel = $(this).val();
                            var rel = <?php echo $row["document_id"];?>;

                            if(ch_val==true){
                              var status = 1;
                            }
                            if(ch_val==false){
                              var status = 0;
                            }

                            $.ajax({
                              url: 'status/statusdoc.php',
                              type: 'POST',
                              data: {id: rel, value: status},
                              success: function (data) {
                                console.log(data);
                                }
                              });

                          
                            })
                          })
                    </script>
                <?php
                  $i=$i+1;
                  echo '<tr>
                      <td> '.$i.'</td>
                      <td data-label="รายวิชา">'.$row["subject_engname"].'</td>
                      <td data-label="ชื่อวิชา">'.$row['document_name'].'</td>
                      <td data-label="ไฟล์เอกสารประกอบการสอน"><a href="uploadbook/'.$row["document_file"].'">ดาวน์โหลด</a></td>
                      <td data-label="สถานะการใช้งาน">'.$status.'</td>
                      <td><button type="button" name="edit"  id="'.$row["document_id"].'" class="btn btn-info btn-xs edit_data"><i class="fas fa-edit"></i></button> </td>  
                      <td>
                        <button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="'.$row["document_id"].'" class="btn btn-info btn-xs view_data"><i class="far fa-eye"></i></button>
                      </td>  
                    </tr>'; 
                   } ?>
                </tr>
              </tbody>
            </table>
    
          </div>
          </section>



<script src="menu/script.js"></script>
  <!-- <script src="../dist/vertical-responsive-menu.min.js"></script> -->
  <script type="text/javascript">
      function input(inputclass,filter){
          for (var i = 0; i < inputclass.length; i++) {
              ["input"].forEach(function(event){
                  inputclass[i].addEventListener(event, function(){
                      console.log(this.value);
                      if (!filter(this.value)) {
                          this.value="";
                      }
                  });
              });

          }
      }
      input(document.getElementsByClassName("th"),function (value) {
          return /^[ก-๏\s]+$/.test(value); //สำหรับภาษาไทย
      });
      input(document.getElementsByClassName("eng"),function (value) {
          return /^[a-zA-Z\s]+$/.test(value); //สำหรับภาษาอังกฤษ
      });
      input(document.getElementsByClassName("number"),function (value) {
          return /^[0-9]*$/.test(value); //สำหรับตัวเลข
      });
  </script>

<script>  
 $(document).ready(function(){  
     
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"BasicData/document/select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"BasicData/document/edit.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail1').html(data);  
                          $('#dataModal1').modal('show');  
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
                     <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลเอกสาร</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
               
           </div>  
      </div>  
 </div>  
 <div id="dataModal1" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title"  id="staticBackdropLabel">แก้ไขข้อมูลเอกสาร</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail1">  
                </div>  
               
           </div>  
      </div>  
 </div>  