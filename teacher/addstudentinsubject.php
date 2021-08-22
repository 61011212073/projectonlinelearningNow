<?php
 require("conn.php");
 mysqli_query($conn,"SET CHARACTER SET UTF8");
 mysqli_query($conn,"SET CHARACTER SET UTF8");
 $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
 FROM coursesopen 
 INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
 INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id";
 $result = mysqli_query($conn,$sql);

 $sql1="SELECT study.study_id,subject.subject_engname,student.student_id,student.student_fname,student.student_lname,study.study_status
 FROM study 
 INNER JOIN coursesopen ON study.study_coursesopen_id=coursesopen.coursesopen_id
 INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
 INNER JOIN student ON study.study_student_id=student.student_id";
 $result1 = mysqli_query($conn,$sql1);

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
  
  <div class="">
    <nav class="vertical_nav">
      <ul id="js-menu" class="menu">
        <li class="menu--item">
          <!-- <br> -->
          <a href="hometeacher.php" class="menu--link" title="Item 2">
            <i class="menu--icon  fa fa-fw fa-home"></i>
            <span class="menu--label">Home</span>
          </a>
        </li>
       
        <!-- <li class="menu--item">
            <a href="student.html" class="menu--link" title="Item 2">
              <i class="menu--icon  fa fa-fw fa-user"></i>
              <span class="menu--label">จัดการข้อมูลนิสิต</span>
            </a>
          </li>
          <li class="menu--item">
            <a href="teacher.php" class="menu--link" title="Item 2">
              <i class="menu--icon  fa fa-fw fa-user"></i>
              <span class="menu--label">จัดการข้อมูลอาจารย์</span>
            </a>
          </li> -->
        <li class="menu--item  menu--item__has_sub_menu">

            <label class="menu--link" title="Item 4">
              <i class="menu--icon  fa fa-pencil fa-fw"></i>
              <span class="menu--label">การทำงานอาจารย์</span>
            </label>
  
            <ul class="sub_menu">
              <li class="sub_menu--item">
                <a href="opensubject.php" class="sub_menu--link">- รายวิชาที่เปิดสอน</a>
              </li>
              <li class="sub_menu--item">
                <a href="addstudentinsubject.php" class="sub_menu--link">- นิสิตในรายวิชา</a>
              </li>
              <li class="sub_menu--item">
                <a href="../adddocument.php" class="sub_menu--link">- เอกสารการสอน</a>
              </li>
              <li class="sub_menu--item">
                <a href="../addvdo.php" class="sub_menu--link">- วิดีทัศน์</a>
              </li>
              <li class="sub_menu--item">
                <a href="../addexam.php" class="sub_menu--link">- แบบฝึกหัด</a>
              </li>
              <li class="sub_menu--item">
                <a href="addstream.php" class="sub_menu--link">- ไลฟ์</a>
              </li>
              <li class="sub_menu--item">
                <a href="exampaper.php" class="sub_menu--link">- ข้อสอบ</a>
              </li>
              <li class="sub_menu--item">
                <a href="http://localhost:5000/teacher" class="sub_menu--link">- ตรวจข้อสอบ</a>
              </li>
            </ul>
          </li>
        </li>
        <li class="menu--item  menu--item__has_sub_menu">

          <label class="menu--link" title="Item 4">
            <i class="menu--icon  fa fa-fw fa-database"></i>
            <span class="menu--label">ข้อมูลพื้นฐาน</span>
          </label>

          <ul class="sub_menu">
            <li class="sub_menu--item">
              <a href="Prename.php" class="sub_menu--link">- คำนำหน้าชื่อ</a>
            </li>
            <li class="sub_menu--item">
              <a href="Univercity.php" class="sub_menu--link">- มหาวิทยาลัย</a>
            </li>
            <li class="sub_menu--item">
              <a href="faculty.php" class="sub_menu--link">- คณะ</a>
            </li>
            <li class="sub_menu--item">
              <a href="department.php" class="sub_menu--link">- ภาควิชา</a>
            </li>
            <li class="sub_menu--item">
              <a href="course.php" class="sub_menu--link">- หลักสูตร</a>
            </li>
            <li class="sub_menu--item">
              <a href="subject.php" class="sub_menu--link">- รายวิชา</a>
            </li>
          </ul>
        </li>

      <button id="collapse_menu" class="collapse_menu">
        <i class="collapse_menu--icon  fa fa-fw"></i>
        <span class="collapse_menu--label">ปิด</span>
      </button>

    </nav>
  </div>
  


  <div class="wrapper">

    <section>
      <div class="container-fluid">
        <h3>ตารางแสดงนิสิตในรายวิชา</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลนิสิตในรายวิชา
              </button>
              <!-- <br><br> -->
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลนิสิตในรายวิชา</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="../teacher/Add/instudy.php" method="POST">
                        <label for="validationCustom01" class="form-label" >รายวิชา</label>
                        <select class="form-select form-control" aria-label="Default select example" name="study_coursesopen_id">
                            <option selected>-เลือกรายวิชา-</option>
                            <?php
                                  while($rows=mysqli_fetch_row($result)){
                                      $uni_id=$rows[0];
                                      $uni_name=$rows[1];
                                      echo "<option value='$uni_id'>$uni_name</option>";
                                  }
                              ?> 
                          </select>
                          
                        <div>
                            <label for="validationCustom01" class="form-label" >รหัสนิสิต</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกรหัสนิสิต" required name="study_student_id">
                          </div>
                      
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
                  <th scope="col">รหัสนิสิต</th>
                  <th scope="col">ชื่อ</th>
                  <th scope="col">นามสกุล</th>
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row=mysqli_fetch_array($result1)){ $i=$i+1 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i?></td>
                  <td data-label="รหัสนิสิต"><?php echo $row['student_id']?></td>
                  <td data-label="ชื่อ"><?php echo $row['student_fname']?></td>
                  <td data-label="นามสกุล"><?php echo $row['student_lname']?></td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                          if ($row['study_status'] == "1") {
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
                              <td><?php echo $i?></td>
                            </tr>
                            <tr>
                              <th scope="row">รหัสนิสิต</th>
                              <td><?php echo $row['student_id']?></td>
                            </tr>
                            <tr>
                              <th scope="row">ชื่อ-สกุล</th>
                              <td><?php echo $row['student_fname']?></td>
                            </tr>
                            <tr>
                                <th scope="row">นามสกุล</th>
                                <td><?php echo $row['student_lname']?></td>
                              </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td>
                              <?php
                                      if ($row['study_status'] == "1") {
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
          <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลนิสิตในรายวิชา</h5>
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
                        <label for="validationCustom01" class="form-label" >รหัสนิสิต</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกรหัสนิสิต" required>
                      </div>
                      
                    <!-- <div class="col-12">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                      </div>
                    </div> -->
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
      
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>