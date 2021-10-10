<?php
     session_start();
     if (!isset($_SESSION['teacher_username'])) {
       header('location: ../login.php');
     }
     if (isset($_GET['logout'])) {
       session_destroy();
       unset($_SESSION['teacher_username']);
       header('location: ../index.html');
     }
     require("conn.php");
     $username=$_SESSION['teacher_username'];
     $sql2="SELECT prename.preName_name,teacher.teacher_fname,teacher.teacher_lname,teacher.teacher_phone,
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
     $sql="SELECT coursesopen.coursesopen_id,subject.subject_engname 
     FROM coursesopen 
     INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
     INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
     WHERE teacher_username='$username'";
     $result = mysqli_query($conn,$sql);
 
     $student=$_GET["std_id"];
     $exam=$_GET["exam"];
     $sql1="SELECT student.student_id,student.student_fname,student.student_lname,examaddwords.examAddwords_question,examaddwords.examAddwords_answer,
     examaddwords.examAddwords_fullscore,examaddwords.examAddwords_keyword,examans_std.examans_std_answer 
     FROM examans_std
     INNER JOIN student ON examans_std.examans_std_std=student.student_id
     INNER JOIN examaddwords ON examans_std.examans_std_examaddwords=examaddwords.examAddwords_id
     INNER JOIN exampapers ON examaddwords.examAddwords_exampapers_id=exampapers.exampapers_id
     WHERE student.student_id=$student";
     $result1 = mysqli_query($conn,$sql1);
     
    $std=mysqli_fetch_assoc($result1);
    $url="http://localhost:5000/check?std_id=".$student."&exam=".$exam;
    $get=file_get_contents($url);
    $sp=explode(";",$get);
    // echo json_encode(array($get),JSON_UNESCAPED_UNICODE);
    //โจทย์กับเฉลย
    $ask_replace=str_replace(array( '(', ')' ), '', $sp[0]);
    $ask_replace2=str_replace(array( '\'', '\'' ), '', $ask_replace);
    $ask_spl=explode(",",$ask_replace2);

    //คำตอบนิสิต
    $std_replace=str_replace(array( '(', ')' ), '', $sp[1]);
    $std_replace2=str_replace(array( '\'', '\'' ), '', $std_replace);
    $std_spl=explode(",",$std_replace2);

    // echo $std_spl[2];

    //ค่าความคล้ายคลึง
    $cosin_replace=str_replace(array( '[', ']' ), '', $sp[2]);
    $cosin_spl=explode(",",$cosin_replace);

    //คำสำคัญ
    $kk=preg_split('/(\[[^]]+\])/', $sp[3], -1, PREG_SPLIT_DELIM_CAPTURE);
    $keyword=[];
    $num=0;
    for ($i=1; $i < COUNT($kk); $i+=2) { 
        $kw_replace=str_replace(array( '[', ']' ), '', $kk[$i]);
        $kw_replace2=str_replace(array( '\'', '\'' ), '', $kw_replace); 
        $keyword[$num]=$kw_replace2;
        $num+=1;
    }
    
    //คะแนน
    $point_replace=str_replace(array( '[', ']' ), '', $sp[4]);
    $point_replace2=str_replace(array( '\'', '\'' ), '', $point_replace); 
    $point_spl=explode(",",$point_replace2);

    
    // $sp1=preg_split("/(\[[^]]+\])/", $get, -1, PREG_SPLIT_DELIM_CAPTURE);
    // echo $get."<br>";
    
    $sp2=str_replace(array( '[', ']' ), '', $sp[0]);
    $sp3=str_replace(array( '"', '"' ), '', $sp2);
    $sp4=explode(",",$sp3);
    // echo $sp4[0];
    // echo count($sp1)."<br>";
    


    // for ($i=0; $i < COUNT($std_spl); $i+=3) { 
    // //     // echo substr($get,2,-3);
    //     echo $std_spl[$i]."<br>";
    // }

?>
<html>  
      <head>  
          <!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Eduglobal - Education & Courses HTML Template">
<meta name="keywords" content="academy, course, education, elearning, learning, education html template, university template, college template, school template, online education template, tution center template">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- SITE TITLE -->
<title>Online Education </title>
<!-- Favicon Icon -->

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- <script src="main.js"></script> -->

<style>
* {
  font-family: 'Kanit', sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.99em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 30px 40px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>
      </head>  

      <body align="center">
      <font face="'Kanit', sans-serif">    
         <!-- <div class="container" >    -->
            
                <h2 align="center"><b style="color:#009879;">การตรวจข้อสอบอัตนัย</b></h2> <br>
                <table class="content-table">
                    <thead>
                         <tr>
                              <td>รหัสนิสิต</td>
                              <td>ชื่อ-สกุลนิสิต</td>
                         </tr>
                    <thead>
                    <tbody>
                         <tr>
                              <td><?php echo $std["student_id"]?></td>
                              <td><?php echo $std["student_fname"]." ".$std["student_lname"]?></td>
                         </tr>
                    </tbody>
               <table>
               <!--<hr> -->
                <div class="form-group" align="center">  
                     <form action="" method="post">  
                          <div class="table-responsive" > 
                         
                               <table class="content-table"> 
                                   <thead>
                                        <tr>
                                             <td>ลำดับ</td>
                                             <td>โจทย์</td>
                                             <td></td>
                                             
                                        </tr>
                                   </thead>
                                   <tbody>
                                   <?php 
                                        ?>
                                        <?php $j=0; for($i=0; $i < COUNT($ask_spl); $i+=2){ $j=$j+1;?>
                                             <tr>
                                                  <td><?php echo $j ?></td>
                                                  
                                                  <td><?php echo $ask_spl[$i];
                                                //   print($row["examAddwords_question"]);
                                                  ?></td>

                                                  <td>
                                                        <b>คำตอบนิสิต :</b> <?php echo $std_spl[$i]?>
                                                       <div style="color:#E9967A;">
                                                       <b>เฉลย :</b> <?php echo $ask_spl[$i+1]?>
                                                       </div>
                                                        <b>ค่าความคล้ายคลึง :</b><?php echo $cosin_spl[$i/2]?>
                                                        &emsp;|&emsp;

                                                       <b>คำสำคัญ :</b><?php echo $keyword[$i/2]?>
                                                       &emsp;|&emsp;
                                                       <b>คะแนน :</b><?php echo $point_spl[$i/2]?>
                                                  </td>
                                                  
                                                  
                                             </tr>
                                       
                                        <?php } ?>
                                   </tbody>
                               </table>  
                               <!--<button type="submit" name="submit" id="submit" class="btn btn-success"/>บันทึกคะแนน</button>-->
                               
                          <!-- </div>   -->
                     </form>
                     <div align='center'>
                         <!-- <button class="btn btn-success" ><a href="/teacher" style="color: white;"><b>กลับ</b></a></button> -->
                         <button class="btn btn-success" ><a href="" style="color: white;"><b>บันทึกคะแนน</b></a></button>
                     </div> <hr>
                </div>  
           </div> 
          </font> 
      </body>  
 </html>  
