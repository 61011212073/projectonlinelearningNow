<?php
    session_start();
    if (!isset($_SESSION['teacher_username'])) {
      header('location: ../login.php');
    }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['teacher_username']);
      header('location: ../index.php');
    }
    require("conn.php");
    $username=$_SESSION['teacher_username'];
    $sql2="SELECT teacher.teacher_id,prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
    teacher.teacher_email,univercity.univercity_thname,faculty.faculty_name,department.department_name,
    teacher.teacher_username,teacher.teacher_password,teacher.teacher_status
    FROM teacher 
    INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id 
    INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
    INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
    INNER JOIN department ON teacher.teacher_department_id=department.department_id 
    WHERE teacher_username='$username'";
    $result2=mysqli_query($conn,$sql2);
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname FROM coursesopen 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
    INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
    WHERE teacher_username='$username'";
    $result = mysqli_query($conn,$sql);

    $sql1="SELECT subject.subject_engname,work_id,work_name,work_detail,work_file,work_date,work_enddate,work_status 
    FROM work 
    INNER JOIN coursesopen ON work.work_courseopen_id=coursesopen.coursesopen_id 
    INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
    INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
    WHERE teacher_username='$username' ORDER BY work_id DESC";
    $result1 = mysqli_query($conn,$sql1);

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <title> Online Education </title>
    <link rel="stylesheet" href="menu/menu.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets1/images/logo3.png">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="Prename1.css" rel="stylesheet">
     <link href="demo/style.css" rel="stylesheet">
     <script src="demo/main.js"></script>
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
        <a href="./teacher/hometeacher1.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">????????????????????????</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./teacher/hometeacher1.php" style="font-family: 'Kanit', sans-serif;">????????????????????????</a></li>
        </ul>
      </li>
      <li>
        <a href="student.php">
          <!-- <i class='bx bx-line-chart' ></i> -->
          <i class='bx bx-user' ></i>
          <span class="link_name" style="font-family: 'Kanit', sans-serif;">?????????????????????????????????</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="student.php" style="font-family: 'Kanit', sans-serif;">?????????????????????????????????</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name" style="font-family: 'Kanit', sans-serif;">?????????????????????????????????????????????</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#" style="font-family: 'Kanit', sans-serif;">?????????????????????????????????????????????</a></li>
          <li><a href="teacher/opensubject.php" style="font-family: 'Kanit', sans-serif;">- ???????????????????????????????????????????????????</a></li>
          <li><a href="teacher/addstudentinsubject.php" style="font-family: 'Kanit', sans-serif;">- ??????????????????????????????????????????</a></li>
          <li><a href="adddocument.php" style="font-family: 'Kanit', sans-serif;">- ????????????????????????????????????</a></li>
          <li><a href="addvdo.php" style="font-family: 'Kanit', sans-serif;">- ???????????????????????????</a></li>
          <li><a href="addexam.php" style="font-family: 'Kanit', sans-serif;">- ???????????????????????????</a></li>
          <li><a href="teacher/addstream.php" style="font-family: 'Kanit', sans-serif;">- ????????????</a></li>
          <li><a href="teacher/exampaper.php" style="font-family: 'Kanit', sans-serif;">- ??????????????????</a></li>
          <li><a href="teacher/checkexam.php" style="font-family: 'Kanit', sans-serif;">- ??????????????????????????????</a></li>
          <li><a href="teacher/news.php" style="font-family: 'Kanit', sans-serif;">- ?????????????????????</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-data'></i>
            <span class="link_name" style="font-family: 'Kanit', sans-serif;">???????????????????????????????????????</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" style="font-family: 'Kanit', sans-serif;">???????????????????????????????????????</a></li>
          <li ><a href="./teacher/Prename.php" style="font-family: 'Kanit', sans-serif;">- ????????????????????????????????????</a></li>
          <li><a href="./teacher/univercity.php" style="font-family: 'Kanit', sans-serif;">- ?????????????????????????????????</a></li>
          <li><a href="./teacher/faculty.php" style="font-family: 'Kanit', sans-serif;">- ?????????</a></li>
          <li><a href="./teacher/department.php" style="font-family: 'Kanit', sans-serif;">- ?????????????????????</a></li>
          <li><a href="./teacher/course.php" style="font-family: 'Kanit', sans-serif;">- ????????????????????????</a></li>
          <li><a href="./teacher/subject.php" style="font-family: 'Kanit', sans-serif;">- ?????????????????????</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
    <div class="profile-content">
        <!-- <img src="image/profile.jpg" alt="profileImg"> -->
        <img src="image/logo1.png" alt="profileImg" style="width: 55px;  height:55px;">
      </div>
      <?php while($row=mysqli_fetch_array($result2)){ ?>
    <a href="teacher/editprofile.php">
      <div class="name-job">
        <div class="profile_name" style="font-family: 'Kanit', sans-serif; font-size: 14px;"><?php echo $row['teacher_fname'];?> <?php echo $row['teacher_lname'];?></div>
        <div class="job" style="font-family: 'Kanit', sans-serif;">Teacher</div>
      </div>
    </a>
      <?php }?>
      <a href="teacher/hometeacher1.php?logout='1'">
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
        <h3>??????????????????????????????????????????????????????</h3>
              <br>
              
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                ????????????????????????????????????????????????????????????
              </button>&nbsp;&nbsp;
              <!-- <select name="" id="" class="btn btn-primary">
            <option value="">-????????????????????????????????????-</option>
          </select> -->
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-color" id="staticBackdropLabel" > ????????????????????????????????????????????????????????????</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
            <form action="inwork.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style='font-family: Kanit, sans-serif;'>
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">??????????????????????????????????????????????????? :</label>
                    <select class="form-select form-control" name="work_courseopen_id" style="font-family: 'Kanit', sans-serif;">
                    <option style="font-family: 'Kanit', sans-serif;">-??????????????????????????????????????????????????????????????????-</option>
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
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">??????????????????????????????????????? :</label>
                    <input type="text" required class="form-control" name="work_name" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">????????????????????????????????????????????????????????? :</label>
                    <!-- <input type="text"   name="document_name" > -->
                    <textarea class="form-control" required name="work_detail" cols="10" rows="10" style="font-family: 'Kanit', sans-serif;"></textarea>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">??????????????????????????????????????? :</label>
                    <input type="file" required class="form-control" name="work_file" style="font-family: 'Kanit', sans-serif;">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">??????????????????????????? :</label>
                    <input type="datetime-local" required class="form-control" name="work_enddate" style="font-family: 'Kanit', sans-serif;">
                    <!-- <input type="time" name="" id=""> -->
                </div>
                
                
           
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit" style="font-family: 'Kanit', sans-serif;">??????????????????</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: 'Kanit', sans-serif;">?????????</button>
            </div>
            </form>
            </div>
                  </div>
                </div>
              </div>

              
            </section>
            <br>
            <br>
            <!-- ?????????????????????????????????????????? -->
            <table>
              <thead>
                <tr>
                  <th scope="col">???????????????</th>
                  <th scope="col">?????????????????????</th>
                  <th scope="col">???????????????????????????????????????</th>
                  <th scope="col">???????????????????????????????????????</th>
                  <th scope="col">????????????????????????????????????</th>
                  <th scope="col">??????????????????????????????????????????</th>
                  <th scope="col">?????????????????????????????????</th>
                  <th scope="col">??????????????????????????????</th>
                  <th scope="col">???????????????????????????</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; while($row = mysqli_fetch_array($result1)){ $i=$i+1 ?>
                <tr>
                  <td data-label="???????????????"><?php echo $i;?></td>
                  <td data-label="???????????????????????????????????????"><?php echo $row['subject_engname'];?></td>
                  <td data-label="???????????????????????????????????????"><?php echo $row['work_name'];?></td>
                  <td data-label="???????????????????????????????????????"><a href="uploadwork/<?=$row["work_file"]?>"><?php echo $row["work_name"];?></a></td>
                  <td data-label="??????????????????????????????"><?php echo $row['work_enddate'];?></td>
                  <td data-label="??????????????????????????????????????????">
                  <?php
                      // echo $row["vdo_id";
                        if ($row["work_status"]==1) {
                          echo '<div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="icon'.$row["work_id"].'" checked>
                        </div>';
                        }
                        else if ($row["work_status"]==0) {
                          echo '<div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="icon'.$row["work_id"].'">
                        </div>';
                        }
                    ?>
                    <script type="text/javascript">
                        $(function() {
                          $('#icon<?php echo $row["work_id"]; ?>').change(function() {
                            var ch_val = $(this).prop('checked');
                            var rel = <?php echo $row["work_id"]; ?>;

                            if(ch_val==true){
                              var status = 1;
                            }
                            if(ch_val==false){
                              var status = 0;
                            }

                            $.ajax({
                                url: 'status/statuswork.php',
                                type: 'POST',
                                data: {id: rel, value: status},
                                success: function (data) {
                                  console.log(data);
                                  }
                              });

                        
                          })
                        })
                    </script>
                  </td>
                  <td>
                  <button type="button" name="edit"  id="<?php echo $row["work_id"]; ?>" class="btn btn-info btn-xs edit_data"><i class='fas fa-edit'></i></button>
            </td>  
            <td>
                  <button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="<?php echo $row["work_id"]; ?>" class="btn btn-info btn-xs view_data"><i class='far fa-eye'></i></button>
            </td> 
        <td data-label="???????????????????????????">
            <a class="btn btn-primary" href="teacher/report.php?work=<?php echo $row["work_id"]?>" role="button" style="background-color: #14746f; border-color: #14746f;"> <i class="fa fa-clipboard"></i></a>
           
</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
    
          </div>
      
      
          </section>

<script src="menu/script.js"></script>

<script>  
 $(document).ready(function(){  
     
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"BasicData/work/select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"BasicData/work/edit.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail1').html(data);  
                          $('#dataModal1').modal('show');  
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
                     <h4 class="modal-title"  id="staticBackdropLabel">?????????????????????????????????????????????????????????????????????????????????</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
               
           </div>  
      </div>  
 </div>  
 <div id="dataModal1" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title"  id="staticBackdropLabel">?????????????????????????????????????????????????????????????????????</h4>  
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body" id="employee_detail1">  
                </div>  
               
           </div>  
      </div>  
 </div> 