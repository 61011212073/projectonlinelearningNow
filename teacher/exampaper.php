<?php
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname 
    FROM coursesopen 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id";
    $result = mysqli_query($conn,$sql);

    // $sql1="SELECT * FROM work ORDER BY work_id DESC";
    // $result1 = mysqli_query($conn,$sql1);

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
        <h3>ตารางแสดงเอกสารสอบ</h3>
              <br>
              
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลเอกสารสอบ
              </button>
               -->
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
                            <option selected>-เลือกรายวิชาที่เปิดสอน-</option>
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
                          
                            <div class="form-group" style="font-family: Kanit, sans-serif;">
                                <label for="pwd" style="font-family: Kanit, sans-serif;">สถานะ :</label>
                                <input type="radio" required name="" value="1"> เปิดการใช้งาน
                                <input type="radio" name="" value="0"> ปิดการใช้งาน
                            </div>
                     
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
                  <th scope="col">ชื่อเอกสารสอบ</th>
                  <!-- <th scope="col">ไฟล์แบบฝึกหัด</th> -->
                  <th scope="col">ประเภทข้อสอบ</th>
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                  <th scope="col">เพิ่มข้อสอบ</th>
                </tr>
              </thead>
              <tbody>
               <!-- $i=0; while($row = mysqli_fetch_array($result1)){ $i=$i+1  -->
                <tr>
                  <td data-label="ลำดับ">1</td>
                  <td data-label="ชื่อเอกสารสอบ">บทที่1</td>
                  <td data-label="ประเภทข้อสอบ">สอบย่อย</td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                          // if ($row['faculty_status'] == "1") {
                            echo "<a style='color:#228B22;'>Active</a>";
                        //   }
                        //  else{
                        //     echo "<a style='color:red;'>Inactive</a>";
                        //  }
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
                          <!-- <div>
                            <tr>
                              <th scope="row">ลำดับ</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th scope="row">รหัสนิสิต</th>
                              <td>นาย</td>
                            </tr>
                            <tr>
                              <th scope="row">ชื่อ</th>
                              <td>ใช้งาน</td>
                            </tr>
                            <tr>
                                <th scope="row">นามสกุล</th>
                                <td>ใช้งาน</td>
                              </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td>ใช้งาน</td>
                            </tr>
                          </div> -->
                          
                         
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
                  <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลแบบฝึกหัด</h5>
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
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกแบบฝึกหัด" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      
                      <div >
                        <label for="formFile" class="form-label">ไฟล์แบบฝึกหัด</label>
                        <input class="form-control" type="file" id="formFile">
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
        <td data-label="การส่งงาน">
            <a class="btn btn-primary" href="http://localhost:81/EdcationWeb_nsc/addExam1.php" role="button" style="background-color: #14746f; border-color: #14746f;"> <i class="fa fa-plus"></i></a>
        </td>
                </tr>
                <!--  } -->
              </tbody>
            </table>
    
          </div>
      
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>