<?php 
  session_start();
  if (!isset($_SESSION['admin_username'])) {
    header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_username']);
    header('location: ../login.php');
  }


  require("conn.php");
  // $sql="SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  // teacher.teacher_email,univercity.univercity_name,faculty.faculty_name,department.department_name,
  // teacher.teacher_username,teacher.teacher_password
  // FROM teacher 
  // INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  // INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  // INNER JOIN department ON teacher.teacher_department_id=department.department_id";
  // $result = mysqli_query($conn,$sql);


  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  // $sql="SELECT * FROM prename";
  // $result = mysqli_query($conn,$sql);

  $query=mysqli_query($conn,"SELECT COUNT(teacher_id) FROM `teacher`");
$row = mysqli_fetch_row($query);

$rows = $row[0]; 

$page_rows = 12;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

$last = ceil($rows/$page_rows);

if($last < 1){
  $last = 1;
}

$pagenum = 1;

if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
  $pagenum = 1;
}
else if ($pagenum > $last) {
  $pagenum = $last;
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

$nquery=mysqli_query($conn,"SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
  teacher.teacher_email,univercity.univercity_name,faculty.faculty_name,department.department_name,
  teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
  FROM teacher 
  INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
  INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
  INNER JOIN department ON teacher.teacher_department_id=department.department_id $limit");

$paginationCtrls = '';

if($last != 1){

if ($pagenum > 1) {
      $previous = $pagenum - 1;
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';
      
              for($i = $pagenum-4; $i < $pagenum; $i++){
                  if($i > 0){
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
                  }
          }
      }
      
          $paginationCtrls .= ''.$pagenum.' &nbsp; ';
      
          for($i = $pagenum+1; $i <= $last; $i++){
              $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
              if($i >= $pagenum+4){
                  break;
              }
          }
      
      if ($pagenum != $last) {
      $next = $pagenum + 1;
      $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
      }
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
    font-size: 15px;
    float: right;
  }
</style>

<body style="font-family: 'Kanit', sans-serif;">

  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars" style="color: white;"></i>
    </button>
    <h1 style="color: white;" >Online Education System</h1>
    <!-- <div ><a href="" class="rig" style="margin-top: 10%;">LOGOUT</a></div> -->
    <button type="button" class="btn btn-outline-danger rig"><a href="demo.php?logout='1'" style="color: white;">LOGOUT</a></button>
    
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fas fa-door-open"></i>
    </button>
   
  </header>
  
  <div class="" style="font-family: 'Kanit', sans-serif;">
    <nav class="vertical_nav">
      <ul id="js-menu" class="menu">
        <li class="menu--item">
          <br>
          <a href="demo.php" class="menu--link" title="Item 2">
            <i class="menu--icon  fa fa-fw fa-home"></i>
            <span class="menu--label">Home</span>
          </a>
        </li>
        <li class="menu--item">
          <a href="teacher.php" class="menu--link" title="Item 2">
            <i class="menu--icon  fa fa-fw fa-user"></i>
            <span class="menu--label">จัดการข้อมูลอาจารย์</span>
          </a>
        </li>
        <li class="menu--item">
          <a href="student.php" class="menu--link" title="Item 2">
            <i class="menu--icon  fa fa-fw fa-user"></i>
            <span class="menu--label">จัดการข้อมูลนิสิต</span>
          </a>
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
        <h3 style="font-family: 'Kanit', sans-serif;">ตารางแสดงข้อมูลอาจารย์</h3>
            </section>
            <br>
            <br>
             <!-- ตารางแสดงข้อูล -->
             <table>
              <thead>
                <tr style="font-family: 'Kanit', sans-serif;">
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
              <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
                <tr style="font-family: 'Kanit', sans-serif;">
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="ชื่อ"><?php echo $row[1];?></td>
                  <td data-label="นามสกุล"><?php echo $row[2];?></td>
                  <td data-label="ชื่อผู้ใช้"><?php echo $row[8];?></td>
                  <td data-label="รหัสผ่าน"><?php echo $row[9];?></td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    
                    <?php
                          if ($row[10] == "1") {
                             echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
                          }
                         else{
                            echo "<a style='color:red;'>ปิดการใช้งาน</a>";
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
                      <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลอาจารย์</h5>
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
                          <th scope="row">คำนำหน้าชื่อ</th>
                          <td><?php echo $row[0];?></td>
                        </tr>
                        <tr>
                          <th scope="row">ชื่อ</th>
                          <td><?php echo $row[1];?></td>
                        </tr>
                        <tr>
                          <th scope="row">นามสกุล</th>
                          <td><?php echo $row[2];?></td>
                        </tr>
                        <tr>
                          <th scope="row">เบอร์โทร</th>
                          <td><?php echo $row[3];?></td>
                        </tr>
                        <tr>
                          <th scope="row">อีเมลล์</th>
                          <td><?php echo $row[4];?></td>
                        </tr>
                        <tr>
                          <th scope="row">มหาวิทยาลัย</th>
                          <td><?php echo $row[5];?></td>
                        </tr>
                        <tr>
                          <th scope="row">คณะ</th>
                          <td><?php echo $row[6];?></td>
                        </tr>
                        <tr>
                          <th scope="row">ภาควิชา</th>
                          <td><?php echo $row[7];?></td>
                        </tr>
                        <tr>
                          <th scope="row">ชื่อผู้ใช้</th>
                          <td><?php echo $row[8];?></td>
                        </tr>
                        <tr>
                          <th scope="row">รหัสผ่าน</th>
                          <td><?php echo $row[9];?></td>
                        </tr>
                        <tr>
                          <th scope="row">สถานะการใช้งาน</th>
                          <td>
                          <?php
                                            if ($row[10] == "1") {
                                              echo "เปิดการใช้งาน";
                                            }
                                            else{
                                              echo "ปิดการใช้งาน";
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
     

                </tr>
                <?php } ?>
              </tbody>
              <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
            </table>
            
          </div>
      
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>