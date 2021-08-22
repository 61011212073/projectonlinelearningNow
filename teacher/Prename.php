<?php
  require("conn.php");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  // $sql="SELECT * FROM prename";
  // $result = mysqli_query($conn,$sql);

  if (isset($_GET['edit'])) {
      $id=$_GET['edit'];

      // $sql="SELECT * FROM prename WHERE id=?";
      // $stml=$conn->prepare($sql);
      // $stml->bind_param("i",$id);
      // $re=$stml->get_result();
      // $rowa=$re->fetch_assoc();

      // $id=$rowa['preName_id'];
      // $name=$rowa['preName_name'];
      // $status=$rowa['preName_status'];
  }

  $query=mysqli_query($conn,"SELECT COUNT(preName_id) FROM `prename`");
$row = mysqli_fetch_row($query);

$rows = $row[0];
 
$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 10 record / หน้า 

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

$nquery=mysqli_query($conn,"SELECT * FROM prename $limit");

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
   <link href="../dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
  <link href="../demo/style.css" rel="stylesheet">
  <script src="../demo/main.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $('.editbtn').on('click', function(){
        $('#editmodal').modal('show');

        console.log("Hello");

        $tr = $(this).closest('tr');
        // var data = $tr.children("td").map(function(){
        //   return $(this).text();
        // }).get();

        // console.log(data);

        // $('#id').val(data[0]);
        // $('#name').val(data[1]);
        // $('#status').val(data[2]);

      });
    });
  </script>


 
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
        <h3>ตารางแสดงข้อมูลคำนำหน้าชื่อ</h3>

              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลคำนำหน้าชื่อ
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" >เพิ่มข้อมูลคำนำหน้าชื่อ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="./Add/insertpre.php" method="post">
                        <div >
                          <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ</label>
                          <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="prename">
                        </div>
                        <div class="form-group" style="font-family: Kanit, sans-serif;">
                          <label for="pwd" style="font-family: Kanit, sans-serif;">สถานะ :</label>
                          <input type="radio" required name="status_prename" value="1"> เปิดการใช้งาน
                          <input type="radio" name="status_prename" value="0"> ปิดการใช้งาน
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
                  <th scope="col">คำนำหน้าชื่อ</th>
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="คำนำหน้าชื่อ"><?php echo $row["preName_name"];?></td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                          if ($row["preName_status"] == "1") {
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
                          <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลคำนำหน้าชื่อ</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-borderless">
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
                                  <td><?php echo $row["preName_name"];?></td>
                                </tr>
                                <tr>
                                  <th scope="row">สถานะการใช้งาน</th>
                                  <td>
                                  <?php
                                        if ($row["preName_status"] == 1) {
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
                    <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background-color: #036666; border-color: #036666;" >
                        <i class="fa fa-edit"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title font-color">แก้ไขข้อมูลคำนำหน้าชื่อ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <label for="validationCustom01" class="form-label">รหัสคำนำหน้าชื่อ</label>
                            <form class="row g-3 needs-validation" novalidate action="./Edit/editpre.php" method="POST">
                            <input type="text" class="form-control" id="validationCustom01 name" value="<?php echo $row["preName_id"];?>" placeholder="รหัสคำนำหน้าชื่อ" required name="preName_id">
                              <div >
                                <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ</label>
                                <input type="text" class="form-control" id="validationCustom01 name" value="<?php echo $row["preName_name"];?>" placeholder="กรอกคำนำหน้าชื่อ" required name="prename">
                              </div>
                              <!-- <div class="col-12">
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                  <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                                </div>
                              </div> -->
                              <div class="form-group" style="font-family: Kanit, sans-serif;">
                                  <label for="pwd" style="font-family: Kanit, sans-serif;">สถานะ :</label>
                                  <?php
                                  if($row['preName_status']== 0){
                                    echo "<input type='radio' required name='status_prename' value='1'> เปิดการใช้งาน";
                                    echo "<input type='radio' name='status_prename' value='0' checked> ปิดการใช้งาน";
                                  }
                                  else if ($row['preName_status']== 1) {
                                    echo "<input type='radio' required name='status_prename' value='1' checked> เปิดการใช้งาน";
                                    echo "<input type='radio' name='status_prename' value='0'> ปิดการใช้งาน";
                                  }
                                  ?>
                                  <!-- <input type="radio" required name="status_prename" value="1"> เปิดการใช้งาน
                                  <input type="radio" name="status_prename" value="0"> ปิดการใช้งาน -->
                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-success">แก้ไข</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              
            </table><br>
            <div id="pagination_controls" style="font-family: Kanit, sans-serif;"><?php echo $paginationCtrls; ?></div>
          </div>
      
      
     

  <script src="../dist/vertical-responsive-menu.min.js"></script>
  <script type="text/javascript">
        function input(inputclass,filter){
            for (var i = 0; i < inputclass.length; i++) {
                ["input"].forEach(function(event){
                    inputclass[i].addEventListener(event, function(){
                        // console.log(this.value);
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


</body>
</html>