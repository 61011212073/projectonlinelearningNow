<?php
  require("conn.php");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $sql="SELECT subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
  FROM coursesopen 
  INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
  INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id";
  $result = mysqli_query($conn,$sql);

  $sql1="SELECT * FROM subject";
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
     <script src="../demo/main.js"></script>
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
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- รายวิชาที่เปิดสอน</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- นิสิตในรายวิชา</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- เอกสารการสอน</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- วีดิทัศน์</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- แบบฝึกหัด</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ไลฟ์</a></li>
          <li><a href="#" style="font-family: 'Kanit', sans-serif;">- ข้อสอบ</a></li>
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
      <div class="name-job">
        <div class="profile_name">Username</div>
        <div class="job">status</div>
      </div>
      <a href="index.php?1">
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
        <h3>ตารางแสดงข้อมูลรายวิชาที่เปิดสอน</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลรายวิชาที่เปิดสอน
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลรายวิชาที่เปิดสอน</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="../teacher/Add/insertopsj.php" method="POST">
                        <label for="validationCustom01" class="form-label" >รายวิชา</label>
                        <select class="form-select form-control" aria-label="Default select example" name="coursesopen_subject_id">
                            <option selected>-เลือกรายวิชา-</option>
                            <?php
                                  while($rows=mysqli_fetch_row($result1)){
                                      $uni_id=$rows[0];
                                      $uni_name=$rows[1];
                                      echo "<option value='$uni_id'>$uni_name</option>";
                                  }
                              ?> 
                          </select>
                          
                     
                        <div >
                            <label for="validationCustom01" class="form-label" >ภาคการศึกษา</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ภาคการศึกษา" required name="coursesopen_term">
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ปีการศึกษา</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ปีการศึกษา" required name="coursesopen_schoolyear">
                          </div>
                          
                        <!-- <div class="col-12">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                          </div>
                        </div> -->
                      
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                      <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
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
                
                  <th scope="col">ชื่อวิชา</th>
                  <th scope="col">ภาคการศึกษา</th>
                  <th scope="col">ปีการศึกษา</th>
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php $i=0; while($row=mysqli_fetch_array($result)){ $i=$i+1 ?>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="ชื่อวิชา"><?php echo $row['subject_engname'];?></td>
                  <td data-label="ภาคการศึกษา"><?php echo $row['coursesopen_term'];?></td>
                  <td data-label="ปีการศึกษา"><?php echo $row['coursesopen_schoolyear'];?></td>
                  <td data-label="สถานะการใช้งาน">
                 
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                          if ($row['coursesopen_status'] == "1") {
                             echo "<a style='color:#228B22;'>Active</a>";
                          }
                         else{
                            echo "<a style='color:red;'>Inactive</a>";
                         }
                   ?>
                  </td>
                  <td data-label="รายละเอียด">
                    <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #14746f; border-color: #14746f;">
                <i class="fa fa-eye"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <!-- modal-fullscreen เต็มจอ modal-xl-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลคณะ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-borderless" >
                        <thead>
                          <tr>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">ข้อมูล</th>
                          </tr>
                        </thead>
                        <tbody>
                          <div>
                            <tr>
                              <th scope="row">ลำดับ</th>
                              <td><?php echo $i;?></td>
                            </tr>
                            <tr>
                              <th scope="row">รายวิชา</th>
                              <td><?php echo $row['subject_engname'];?></td>
                            </tr>
                            <tr>
                              <th scope="row">ภาคการศึกษา</th>
                              <td><?php echo $row['coursesopen_term'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">ปีการศึกษา</th>
                                <td><?php echo $row['coursesopen_schoolyear'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">อาจารย์ผู้สอน</th>
                                <td><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></td>
                              </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td>
                              <?php
                                      if ($row['coursesopen_status'] == "1") {
                                        echo "<a style='color:#228B22;'>Active</a>";
                                      }
                                    else{
                                        echo "<a style='color:red;'>Inactive</a>";
                                    }
                              ?>
                              </td>
                            </tr>
                          </div>
                          
                         
                        </tbody>
                      </table>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
              </div>
            </div>
          </div>
          <!-- modal -->
        </td>
        <td data-label="แก้ไขข้อมูล">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background-color: #036666; border-color: #036666;" >
            <i class="fa fa-edit"></i>
          </button>
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-color" id="staticBackdropLabel1" >แก้ไขข้อมูลรายวิชาที่เปิดสอน</h5>
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
                        <label for="validationCustom01" class="form-label" >ภาคการศึกษา</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกคณะ" required>
                      </div>
                      <div >
                        <label for="validationCustom01" class="form-label" >ปีการศึกษา</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกคณะ" required>
                      </div>
                      
                      
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-success">แก้ไขข้อมูล</button>
                </div>
              </div>
            </div>
          </div>
        </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
    
          </div>
      
<!-- </section> -->
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>