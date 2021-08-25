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
     mysqli_query($conn,"SET CHARACTER SET UTF8");
     mysqli_query($conn,"SET CHARACTER SET UTF8");
     $username=$_SESSION['admin_username'];
       $sql="SELECT admin_fname,admin_lname FROM admin WHERE admin_username='$username'";
       $result=mysqli_query($conn,$sql);

         $query=mysqli_query($conn,"SELECT COUNT(univercity_id) FROM `univercity`");
         $row = mysqli_fetch_row($query);
      
         $rows = $row[0];
      
         $page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
      
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
      
         $nquery=mysqli_query($conn,"SELECT * FROM univercity $limit");
      
         $paginationCtrls = '';
      
         if($last != 1){
      
         if ($pagenum > 1) {
             $previous = $pagenum - 1;
                     $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info" style="font-family: Kanit, sans-serif;"><-</a> &nbsp; &nbsp; ';
             
                     for($i = $pagenum-4; $i < $pagenum; $i++){
                         if($i > 0){
                     $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary" style="font-family: Kanit, sans-serif;">'.$i.'</a> &nbsp; ';
                         }
                 }
             }
             
                 $paginationCtrls .= ''.$pagenum.' &nbsp; ';
             
                 for($i = $pagenum+1; $i <= $last; $i++){
                     $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary" style="font-family: Kanit, sans-serif;">'.$i.'</a> &nbsp; ';
                     if($i >= $pagenum+4){
                         break;
                     }
                 }
             
             if ($pagenum != $last) {
             $next = $pagenum + 1;
             $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info" style="font-family: Kanit, sans-serif;">-></a> ';
             }
                 }
     
?>
<?php if (isset($_REQUEST['univercity_id'])) {
                              $id = $_REQUEST['univercity_id'];
                              echo $id;
                          }?>
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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
          <span class="link_name">หน้าหลัก</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="homeadmin.php">หน้าหลัก</a></li>
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
        <h3>ตารางแสดงข้อมูลมหาวิทยาลัย</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลมหาวิทยาลัย
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลมหาวิทยาลัย</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="./Add/insertuni.php" method="post">
                        <div>
                          <label for="validationCustom01" class="form-label" >ชื่อมหาวิทยาลัยภาษาไทย</label>
                          <input type="text" class="form-control only" name="univercity_thname" id="validationCustom01" placeholder="กรอกชื่อมหาวิทยาลัย" required >
                          <!-- <div class="valid-feedback">
                            Looks good!
                          </div> -->
                        </div>
                        <div>
                          <label for="validationCustom01" class="form-label" >ชื่อมหาวิทยาลัยภาษาอังกฤษ</label>
                          <input type="text" class="form-control only" name="univercity_engname" id="validationCustom01" placeholder="กรอกชื่อมหาวิทยาลัย" required >
                          <!-- <div class="valid-feedback">
                            Looks good!
                          </div> -->
                        </div>
                        <div >
                            <label for="validationCustom01" class="form-label" >ตัวย่อมหาวิทยาลัย(ภาษาไทย)</label>
                            <input type="text" class="form-control only" name="univercity_thcode" id="validationCustom01" placeholder="กรอกตัวย่อมหาวิทยาลัย(ภาษาไทย)" required >
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ตัวย่อมหาวิทยาลัย(ภาษาอังกฤษ)</label>
                            <input type="text" class="form-control onlys" name="univercity_engcode" id="validationCustom01" placeholder="กรอกตัวย่อมหาวิทยาลัย(ภาษาอังกฤษ)" required >
                          </div>
                        <!-- <div class="form-group" style="font-family: Kanit, sans-serif;">
                          <label for="pwd" style="font-family: Kanit, sans-serif;">สถานะ :</label>
                          <input type="radio" required name="status_univercity" value="1"> เปิดการใช้งาน
                          <input type="radio" name="status_univercity" value="0"> ปิดการใช้งาน
                        </div> -->
                        <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                      </form>
                    </div>
                    
                    
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
                  <th scope="col">มหาวิทยาลัย</th> 
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
                <tr>
                  <!-- แสดงข้อมูลในตารางที่กดปุ่มรายละเอียด -->
                      <td data-label="ลำดับ">
                        <?php echo $i;?>
                      </td>
                      <td data-label="มหาวิทยาลัย"><?php echo $row[1];?></td>
                      <td data-label="สถานะการใช้งาน">
                        <!-- <div class="col-12">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>
                        </div> -->
                        <?php
                           if ($row[5] == "1") {
                            echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
                          }
                         else{
                            echo "<a style='color:red;'>ปิดการใช้งาน</a>";
                         }
                   ?>
                      </td>
                      <td><input type="button" name="edit" value="Edit" id="<?php echo $row["univercity_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
              <td><input type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["univercity_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                </tr>
                <?php } ?>
              </tbody>
            </table><br>
            <div id="pagination_controls" style="font-family: Kanit, sans-serif;"><?php echo $paginationCtrls; ?></div>                            
          </div>
      
      
     

          </section>

<script src="menu/script.js"></script>
  <script src="../dist/vertical-responsive-menu.min.js"></script>
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
                   url:"../BasicData/univercity/select.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                   success:function(data){  
                        $('#employee_detail').html(data);  
                        $('#dataModal').modal('show');  
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
                   <h4 class="modal-title"  id="staticBackdropLabel">ตารางแสดงข้อมูลมหาวิทยาลัย</h4>  
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>  
              <div class="modal-body" id="employee_detail">  
              </div>  
             
         </div>  
    </div>  
</div>  

