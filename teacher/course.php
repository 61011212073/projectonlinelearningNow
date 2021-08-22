<?php
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $query=mysqli_query($conn,"SELECT COUNT(course_id) FROM `course`");
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
 
	$nquery=mysqli_query($conn,"SELECT course.course_thname,course.course_engname,course.course_thcode,course.course_engcode,course.course_year_mco2,univercity.univercity_name,faculty.faculty_name,department.department_name,course.course_status 
    FROM course 
    INNER JOIN univercity ON course.course_univercity_id=univercity.univercity_id 
    INNER JOIN department ON course.course_dpm_id=department.department_id 
    INNER JOIN faculty ON course.course_faculty_id=faculty.faculty_id $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info"><-</a> &nbsp; &nbsp; ';
        
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
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">-></a> ';
        }
            }

    $sql1="SELECT * FROM faculty";
    $results = mysqli_query($conn,$sql1);
    
    $sql2="SELECT * FROM department";
    $resultss = mysqli_query($conn,$sql2);
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
  <script src="jquery.main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#authors").change(function(){
				var aid = $("#authors").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(books){
					console.log(books);
					books = JSON.parse(books);
					$('#books').empty();
					books.forEach(function(book){
						$('#books').append('<option value="'+book.faculty_id+'">' + book.faculty_name + '</option>')
					})
				})
			})
		})
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
        <h3>ตารางแสดงข้อมูลหลักสูตร</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                เพิ่มข้อมูลหลักสูตร
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลหลักสูตร</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3 needs-validation" novalidate action="./Add/insertco.php" method="post">
                        <div >
                            <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาไทย</label>
                            <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกหลักสูตรภาษาไทย" required>
                            
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาอังกฤษ</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกหลักสูตรภาษาอังกฤษ" required>
                            
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาไทย</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกตัวย่อหลักสูตรภาษาไทย" required>
                            
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาอังกฤษ</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกตัวย่อหลักสูตรภาษาอังกฤษ" required>
                            
                          </div>
                          <div >
                            <label for="validationCustom01" class="form-label" >ปีมคอ.2</label>
                            <input type="text" class="form-control number" id="validationCustom01" placeholder="กรอกปีมคอ.2" required>
                            
                          </div>
                          <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>
                          <select class="form-select form-control" aria-label="Default select example" name="course_univarcity_id" id="authors">
                              <option selected>เลือกมหาวิทยาลัย</option>
                              <?php 
                              require 'data.php';
                              $authors = loadAuthors();
                              foreach ($authors as $author) {
                                echo "<option id='".$author['univercity_id']."' value='".$author['univercity_id']."'>".$author['univercity_name']."</option>";
                              }
		                    	 ?>
                          </select> 
                          <label for="validationCustom01" class="form-label" >คณะ</label>
                          <select class="form-select form-control" aria-label="Default select example" name="course_faculty_id" id="books">
                            
                            </select> 
                          
                          <label for="validationCustom01" class="form-label" >ภาควิชา</label>
                          <select class="form-select form-control" aria-label="Default select example">
                              <option selected>เลือกภาควิชา</option>
                              <?php
                                  while($rows=mysqli_fetch_row($resultss)){
                                      $uni_id=$rows[0];
                                      $uni_name=$rows[1];
                                      echo "<option value='$uni_id'>$uni_name</option>";
                                  }
                              ?> 
                            </select> 
                            </select> 
                            <div class="form-group" style="font-family: 'Kanit', sans-serif;">
                                <label for="pwd">สถานะ :</label>
                                <!-- <input type="text" class="form-control" name="status_prename"> -->
                                <input type="radio" required name="course_status" value="1" style="font-family: 'Kanit', sans-serif;"> เปิดการใช้งาน
                                <input type="radio" name="course_status" value="0" style="font-family: 'Kanit', sans-serif;"> ปิดการใช้งาน
                            </div>
                        
                      </form>
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                      <button type="button" class="btn btn-success">บันทึกข้อมูล</button>
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
                  <th scope="col">ชื่อหลักสูตรภาษาไทย</th>
                  <th scope="col">ชื่อหลักสูตรภาษาอังกฤษ</th>
                  <th scope="col">ภาควิชา</th> 
                  <th scope="col">สถานะการใช้งาน</th>
                  <th scope="col">รายละเอียด</th>
                  <th scope="col">แก้ไขข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row=mysqli_fetch_array($nquery)){ $i=$i+1 ?>
                <tr>
                  <td data-label="ลำดับ"><?php echo $i;?></td>
                  <td data-label="ชื่อหลักสูตรภาษาไทย"><?php echo $row[0]?></td>
                  <td data-label="ชื่อหลักสูตรภาษาอังกฤษ"><?php echo $row[1]?></td>
                  <td data-label="ภาควิชา"><?php echo $row[7]?></td>
                  <td data-label="สถานะการใช้งาน">
                    <!-- <div>
                      <div class="form-check form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div> -->
                    <?php
                         if ($row['course_status'] == "1") {
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
                      <h5 class="modal-title" id="exampleModalLabel">ตารางแสดงข้อมูลหลักสูตร</h5>
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
                              <th scope="row">ชื่อหลักสูตรภาษาไทย</th>
                              <td><?php echo $row[0]?></td>
                            </tr>
                            <tr>
                              <th scope="row">ชื่อหลักสูตรภาษาอังกฤษ</th>
                              <td><?php echo $row[1]?></td>
                            </tr>
                            <tr>
                              <th scope="row">ตัวย่อหลักสูตรภาษาไทย</th>
                              <td><?php echo $row[2]?></td>
                            </tr>
                            <tr>
                              <th scope="row">ตัวย่อหลักสูตรภาษาอังกฤษ</th>
                              <td><?php echo $row[3]?></td>
                            </tr>
                            <tr>
                              <th scope="row">ปีมคอ.2</th>
                              <td><?php echo $row[4]?></td>
                            </tr>
                            <tr>
                              <th scope="row">มหาวิทยาลัย</th>
                              <td><?php echo $row['univercity_name']?></td>
                            </tr>
                            <tr>
                              <th scope="row">คณะ</th>
                              <td><?php echo $row[6]?></td>
                            </tr>
                            <tr>
                              <th scope="row">ภาควิชา</th>
                              <td><?php echo $row[7]?></td>
                            </tr>
                            <tr>
                              <th scope="row">สถานะการใช้งาน</th>
                              <td><?php
                                    if ($row['course_status'] == "1") {
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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #036666; border-color: #036666;" >
            <i class="fa fa-edit"></i>
          </button>
         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title font-color" id="staticBackdropLabel" > เพิ่มข้อมูลหลักสูตร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate>
                  <div >
                      <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาไทย</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกหลักสูตรภาษาไทย" required>
                      
                    </div>
                    <div >
                      <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาอังกฤษ</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกหลักสูตรภาษาอังกฤษ" required>
                      
                    </div>
                    <div >
                      <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาไทย</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกตัวย่อหลักสูตรภาษาไทย" required>
                      
                    </div>
                    <div >
                      <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาอังกฤษ</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกตัวย่อหลักสูตรภาษาอังกฤษ" required>
                      
                    </div>
                    <div >
                      <label for="validationCustom01" class="form-label" >ปีมคอ.2</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกปีมคอ.2" required>
                      
                    </div>
                    <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>
                  <select class="form-select form-control" aria-label="Default select example">
                      <option selected>เลือกมหาวิทยาลัย</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select> 
                    <label for="validationCustom01" class="form-label" >คณะ</label>
                  <select class="form-select form-control" aria-label="Default select example">
                      <option selected>เลือกคณะ</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select> 
                    <label for="validationCustom01" class="form-label" >ภาควิชา</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected>เลือกภาควิชา</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select> 
                    
                  <div class="col-12">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">สถานะการใช้งาน</label>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-success">บันทึกข้อมูล</button>
              </div>
            </div>
          </div>
        </div>
        </td>
                </tr>
                
                          
                </tr>
                <?php } ?>
         </tbody>
              <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
            </table>
    
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