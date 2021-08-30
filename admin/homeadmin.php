<?php
    session_start();
    if (!isset($_SESSION['admin_username'])) {
      header('location: ../login.php');
    }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['admin_username']);
      header('location: ../index.html');
    }
    require("conn.php");
    $username=$_SESSION['admin_username'];
    $sql="SELECT admin_fname,admin_lname FROM admin WHERE admin_username='$username'";
    $result=mysqli_query($conn,$sql);

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
  teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
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
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Online Education </title>
    <link rel="stylesheet" href="menu/menu.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="../demo/style.css" rel="stylesheet">
     <script src="../demo/main.js"></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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
        <a href="homeadmin.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">HOME</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="homeadmin.php">HOME</a></li>
        </ul>
      </li>
      <li>
        <a href="teacher.php">
        <i class='bx bx-user' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">ข้อมูลอาจารย์</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher.php" style="font-family: 'Kanit', sans-serif;">ข้อมูลอาจารย์</a></li>
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
      <?php while($row=mysqli_fetch_array($result)){ ?>
      <div class="name-job">
        <div class="profile_name"><?php echo $row['admin_fname'];?></div>
        <div class="job"><?php echo $row['admin_lname'];?></div>
      </div>
      <?php }?>
      <a href="homeadmin.php?logout='1'">
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
  <div class="container-fluid">
    <h3 style="font-family: 'Kanit', sans-serif;">ตารางแสดงข้อมูลอาจารย์</h3>

        <br>
        <br>
         <!-- ตารางแสดงข้อูล -->
         <table>
          <thead>
            <tr>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">ลำดับ</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">ชื่อ</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">นามสกุล</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">ชื่อผู้ใช้</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">รหัสผ่าน</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">สถานะการใช้งาน</th>
                        <th scope="col" style="font-family: 'Kanit', sans-serif;">รายละเอียด</th>
                        
            </tr>
          </thead>
          <tbody>
          <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
            <tr>
              <td data-label="ลำดับ" style="font-family: 'Kanit', sans-serif;"><?php echo $i;?></td>
              <td data-label="ชื่อ" style="font-family: 'Kanit', sans-serif;"><?php echo $row[1];?></td>
              <td data-label="นามสกุล" style="font-family: 'Kanit', sans-serif;"><?php echo $row[2];?></td>
              <td data-label="ชื่อผู้ใช้" style="font-family: 'Kanit', sans-serif;"><?php echo $row[8];?></td>
              <td data-label="รหัสผ่าน" style="font-family: 'Kanit', sans-serif;"><?php echo $row[9];?></td>
              <td data-label="สถานะการใช้งาน" style="font-family: 'Kanit', sans-serif;">
                <!-- <div>
                  <div class="form-check form-switch" >
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                  </div>
                </div> -->
                
                <?php
                      if ($row[10] == "1") {
                         echo "<a style='color:#228B22; font-family:Kanit, sans-serif;'>เปิดการใช้งาน</a>";
                      }
                     else{
                        echo "<a style='color:red; font-family:Kanit, sans-serif;'>ปิดการใช้งาน</a>";
                     }
               ?>
              </td>
              <td data-label="รายละเอียด" style="font-family: 'Kanit', sans-serif;">
                <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #14746f; border-color: #14746f;">
          <i class='bx bx-show-alt'></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <!-- modal-fullscreen เต็มจอ modal-xl-->
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kanit', sans-serif;">ตารางแสดงข้อมูลอาจารย์</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col" style="font-family: 'Kanit', sans-serif;">หัวข้อ</th>
                    <th scope="col" style="font-family: 'Kanit', sans-serif;">ข้อมูล</th>
                  </tr>
                </thead>
                <tbody>
                  <div>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">ลำดับ</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $i;?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">คำนำหน้าชื่อ</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[0];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">ชื่อ</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[1];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">นามสกุล</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[2];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">เบอร์โทร</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[3];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">อีเมลล์</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[4];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">มหาวิทยาลัย</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[5];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">คณะ</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[6];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">ภาควิชา</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[7];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">ชื่อผู้ใช้</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[8];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">รหัสผ่าน</th>
                      <td style="font-family: 'Kanit', sans-serif;"><?php echo $row[9];?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="font-family: 'Kanit', sans-serif;">สถานะการใช้งาน</th>
                      <td style="font-family: 'Kanit', sans-serif;">
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
  </section>

 

  <script src="menu/script.js"></script>

</body>
</html>
