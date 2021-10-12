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
    $sql2="SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
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

    $sql1="SELECT subject.subject_engname,exampapers.exampapers_id,exampapers.exampapers_name,exampapers.exampapers_category,exampapers.exampapers_status 
    FROM exampapers 
    INNER JOIN coursesopen ON exampapers.exampapers_coursesopen_id=coursesopen.coursesopen_id
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id";
    $result1 = mysqli_query($conn,$sql1);

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
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
    
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="../demo/main.js"></script>
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" style="font-family: 'Kanit', sans-serif;">หน้าหลัก</a></li>
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
          <li><a href="checkexam.php" style="font-family: 'Kanit', sans-serif;">- ตรวจข้อสอบ</a></li>
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
        <h3>ตารางแสดงตรวจข้อสอบ</h3>
              <br>
              
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลเอกสารสอบ
              </button>&nbsp;&nbsp; -->
              <!-- <select name="" id="" class="btn btn-primary">
            <option value="">-ค้นหารายวิชา-</option>
          </select> -->
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" >เพิ่มข้อมูลเอกสารสอบ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate>
                        <label for="validationCustom01" class="form-label" >รายวิชาที่เปิดสอน</label>
                        <select class="form-select form-control" aria-label="Default select example">
                            <option selected disabled>-เลือกรายวิชาที่เปิดสอน-</option>
                            <?php
                            while($rows=mysqli_fetch_row($result)){
                                $uni_id=$rows[0];
                                $uni_name=$rows[1];
                                echo "<option value='$uni_id' style='font-family: Kanit, sans-serif;'>$uni_name</option>";
                            }
                        ?> 
                          </select>
                          
                        <div >
                            <label for="validationCustom01" class="form-label">กรอกชื่อเอกสาร</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกชื่อเอกสาร" required>
                          </div>
                          
                          <div >
                            <label for="formFile" class="form-label">ประเภทการสอบ</label>
                            <!-- <input class="form-control" type="file" id="formFile"> -->
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>-ประเภทของการสอบ-</option>
                                <option value="1">สอบย่อย</option>
                                <option value="2">สอบกลางภาค</option>
                                <option value="3">สอบปลายภาค</option>

                            </select>
                            </div>
                          
                            <!-- <div class="form-group" style="font-family: Kanit, sans-serif;">
                                <label for="pwd" style="font-family: Kanit, sans-serif;">สถานะ :</label>
                                <input type="radio" required name="" value="1"> เปิดการใช้งาน
                                <input type="radio" name="" value="0"> ปิดการใช้งาน
                            </div> -->
                     
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                      <button type="button" class="btn btn-success">บันทึกข้อมูล</button>
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
                  <th scope="col">ชื่อเอกสารสอบ</th>
                  <th scope="col">ประเภทข้อสอบ</th>
                  <!-- <th scope="col">สถานะการใช้งาน</th> -->
                  <!-- <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th> -->
                  <th scope="col">ตรวจข้อสอบ</th>
                </tr>
              </thead>
              <tbody>
               <!-- $i=0; while($row = mysqli_fetch_array($result1)){ $i=$i+1  -->
                <?php $i=0; while($row = mysqli_fetch_array($result1)){ $i=$i+1  ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i?></td>
                  <td data-label="รายวิชา"><?php echo $row["subject_engname"]?></td>
                  <td data-label="ชื่อเอกสารสอบ"><?php echo $row["exampapers_name"]?></td>
                  <td style="font-family: 'Kanit', sans-serif;">
                  <?php 
                    if ($row["exampapers_category"]==1) {
                        echo "สอบย่อย";
                    }
                    else if ($row["exampapers_category"]==2) {
                      echo "สอบกลางภาค";
                    }
                    else if ($row["exampapers_category"]==3) {
                      echo "สอบปลายภาค";
                    }
                    ?></td>
                  
                  <!-- <td data-label="สถานะการใช้งาน">
                  
                  </td> -->
                  <!-- <td data-label="รายละเอียด">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #14746f; border-color: #14746f;">
                <i class="fa fa-eye"></i>
              </button>
        </td>
        <td data-label="แก้ไขข้อมูล">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background-color: #036666; border-color: #036666;" >
            <i class="fa fa-edit"></i>
          </button>
        </td> -->
        <td data-label="การส่งงาน">
            <a class="btn btn-primary" href="chackex_std.php?exam=<?php echo $row["exampapers_id"]?>" role="button" style="background-color: #14746f; border-color: #14746f;"> <i class="fa fa-plus"></i></a>
        </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
    
          </div>
         
          </section>

<script src="menu/script.js"></script>

</body>
</html>