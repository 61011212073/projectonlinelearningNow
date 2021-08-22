<?php
  session_start();
  if (!isset($_SESSION['teacher_username'])) {
    header('location: ../index.html');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['teacher_username']);
    header('location: ../index.html');
  }
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
  .rig{
    margin: 0;
    padding: 0 15px;
    height: 50px;
    line-height: 50px;
    font-weight: 400;
    font-size: 16px;
    float: right;
    /* padding-right: 15px; */
  }
</style>

<body style="font-family: 'Kanit', sans-serif;">

  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars" style="color: white;"></i>
    </button>
    <h1 style="color: white;">Online Education System</h1>
    <button type="button" class="btn btn-outline-danger rig"><a href="hometeacher.php?logout='1'" style="color: white;">LOGOUT</a></button>
   
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
            <a href="student.php" class="menu--link" title="Item 2">
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
        <!-- <h3>ตารางแสดงข้อมูลอาจารย์</h3> -->
            </section>
            <br>
            <br>
             <!-- ตารางแสดงข้อูล -->
             <!-- <table>
              <thead>
                <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">รหัสผ่าน</th>
                            <th scope="col">สถานะการใช้งาน</th>
                            <th scope="col">รายละเอียด</th>
                            
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="ชื่อ">1</td>
                  <td data-label="นามสกุล">a</td>
                  <td data-label="ชื่อผู้ใช้">$1,190</td>
                  <td data-label="รหัสผ่าน">$1,190</td>
                  <td data-label="รหัสผ่าน">$1,190</td>
                  <td data-label="สถานะการใช้งาน">
                    <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div>
                  </td>
                  <td data-label="รายละเอียด"> -->
                    <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #14746f; border-color: #14746f;">
                <i class="fa fa-eye"></i>
              </button> -->

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <!-- modal-fullscreen เต็มจอ modal-xl-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลอาจารย์</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table>
                        <thead>
                          <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">คำนำหน้าชื่อ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">อีเมลล์</th>
                            <th scope="col">มหาวิทยาลัย</th>
                            <th scope="col">คณะ</th>
                            <th scope="col">ภาควิชา</th>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">รหัสผ่าน</th>
                            <th scope="col">สถานะการใช้งาน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td data-label="ลำดับ">1</td>
                            <td data-label="คำนำหน้าชื่อ">กรุงเทพ</td>
                            <td data-label="ชื่อ">วิทยาการสาสนเทศ</td>
                            <td data-label="นามสกุล">ใช้งาน</td>
                            <td data-label="เบอร์โทร">วิทยาการสาสนเทศ</td>
                            <td data-label="อีเมลล์">ใช้งาน</td>
                            <td data-label="มหาวิทยาลัย">1</td>
                            <td data-label="คณะ">กรุงเทพ</td>
                            <td data-label="ภาควิชา">วิทยาการสาสนเทศ</td>
                            <td data-label="ชื่อผู้ใช้">ใช้งาน</td>
                            <td data-label="รหัสผ่าน">วิทยาการสาสนเทศ</td>
                            <td data-label="สถานะการใช้งาน">ใช้งาน</td>
                            
                          </tr>
                         
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
     

                </tr>
              </tbody>
            </table>
    
          </div>
      
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>