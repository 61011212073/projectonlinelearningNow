<?php
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id";
    $result = mysqli_query($conn,$sql);

    $sql1="SELECT * FROM vdo ORDER BY vdo_id DESC";
    $result1 = mysqli_query($conn,$sql1);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Online Education System</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
  <link href='src/vendor/normalize.css/normalize.css' rel='stylesheet'>
  <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href="dist/vertical-responsive-menu.min.css" rel="stylesheet">
  <link href="Prename.css" rel="stylesheet">
  <!-- <link href="../dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
  <link href="demo/style.css" rel="stylesheet">
  <script src="demo/main.js"></script>
   
  


 
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
                <a href="./teacher/opensubject.php" class="sub_menu--link">- รายวิชาที่เปิดสอน</a>
              </li>
              <li class="sub_menu--item">
                <a href="./teacher/addstudentinsubject.php" class="sub_menu--link">- นิสิตในรายวิชา</a>
              </li>
              <li class="sub_menu--item">
                <a href="adddocument.php" class="sub_menu--link">- เอกสารการสอน</a>
              </li>
              <li class="sub_menu--item">
                <a href="addvdo.php" class="sub_menu--link">- วิดีทัศน์</a>
              </li>
              <li class="sub_menu--item">
                <a href="addexam.php" class="sub_menu--link">- แบบฝึกหัด</a>
              </li>
              <li class="sub_menu--item">
                <a href="./teacher/addstream.php" class="sub_menu--link">- ไลฟ์</a>
              </li>
              <li class="sub_menu--item">
                <a href="./teacher/exampaper" class="sub_menu--link">- ข้อสอบ</a>
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
              <a href="./teacher/Prename.php" class="sub_menu--link">- คำนำหน้าชื่อ</a>
            </li>
            <li class="sub_menu--item">
              <a href="./teacher/Univercity.php" class="sub_menu--link">- มหาวิทยาลัย</a>
            </li>
            <li class="sub_menu--item">
              <a href="./teacher/faculty.php" class="sub_menu--link">- คณะ</a>
            </li>
            <li class="sub_menu--item">
              <a href="./teacher/department.php" class="sub_menu--link">- ภาควิชา</a>
            </li>
            <li class="sub_menu--item">
              <a href="./teacher/course.php" class="sub_menu--link">- หลักสูตร</a>
            </li>
            <li class="sub_menu--item">
              <a href="./teacher/subject.php" class="sub_menu--link">- รายวิชา</a>
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
        <h3>ตารางแสดงวิดีทัศน์</h3>


              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลวิดีทัศน์
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลวิดีทัศน์</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
            <form action="invdo.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <select name="vdo_coursesopen_id" style="font-family: 'Kanit', sans-serif;">
                    <option style="font-family: 'Kanit', sans-serif;">-เลือกรายวิชาที่เปิดสอน-</option>
                        <?php
                            while($rows=mysqli_fetch_row($result)){
                                $uni_id=$rows[0];
                                $uni_name=$rows[1];
                                echo "<option value='$uni_id' style='font-family: Kanit, sans-serif;'>$uni_name</option>";
                            }
                        ?> 
                    </select>
                    <!-- <input type="text" required class="form-control" name="prename"> -->
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ชื่อวีดีโอ :</label>
                    <input type="text" required class="form-control" name="vdo_name" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">ไฟล์วีดีโอ :</label>
                    <input type="file" required class="form-control" name="vdo_link" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group" style="font-family: 'Kanit', sans-serif;">
                    <label for="pwd" style="font-family: 'Kanit', sans-serif;">สถานะ :</label>
                    <!-- <input type="text" class="form-control" name="status_prename"> -->
                    <input type="radio" name="vdo_status" required value="1" style="font-family: 'Kanit', sans-serif;"> เปิดการใช้งาน
                    <input type="radio" name="vdo_status" value="0" style="font-family: 'Kanit', sans-serif;"> ปิดการใช้งาน
                </div>
                
                
           
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit" style="font-family: 'Kanit', sans-serif;">ยืนยัน</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: 'Kanit', sans-serif;">ปิด</button>
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
                  <th scope="col">ชื่อวิดีทัศน์</th>
                  <th scope="col">ไฟล์วิดีทัศน์</th>
                 
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($result1) > 0) { $i=0;
		 	            while ($video = mysqli_fetch_assoc($result1)) {  $i=$i+1;
                 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="ชื่อวิชา"><?php echo $video['vdo_name'];?></td>
                  <!-- <td data-label="ไฟล์วิดีทัศน์"><?php echo $video['vdo_link'];?></td> -->
                  <td data-label="ไฟล์วิดีทัศน์"><a href="uploadvdo/<?=$video['vdo_link']?>" class="video_popup video_play"><span class="ripple"><?php echo $video['vdo_name']; ?><i class="ion-play"></i></span></a></td>
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
                          <div>
                            <tr>
                              <th scope="row">ลำดับ</th>
                              <td><?php echo $i;?></td>
                            </tr>
                            <tr>
                              <th scope="row">รายวิชา</th>
                              <td>นาย</td>
                            </tr>
                            <tr>
                              <th scope="row">ชื่อวิดีทัศน์</th>
                              <td><?php echo $video['vdo_name'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">ไฟล์วิดีทัศน์</th>
                                <td><a href="uploadvdo/<?=$video['vdo_link']?>" class="video_popup video_play"><span class="ripple"><?php echo $video['vdo_name']; ?><i class="ion-play"></i></span></a></td>
                              </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td><?php echo $video['vdo_status'];?></td>
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
                  <h5 class="modal-title font-color" id="staticBackdropLabel1" > เพิ่มข้อมูลวิดีทัศน์</h5>
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
                        <label for="validationCustom01" class="form-label" >ชื่อวิดีทัศน์</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกคณะ" required>
                      </div>
                      
                      <div >
                        <label for="formFile" class="form-label">ไฟล์วิดีทัศน์</label>
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
                </tr>
                <?php }
                        }else {
                            // echo "<h1>ยังไม่มีวีดีโอการสอน</h1>";
                        } ?>
              </tbody>
            </table>
    
          </div>
      
      
     

  <script src="dist/vertical-responsive-menu.min.js"></script>

</body>
</html>