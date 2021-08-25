<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT study.study_id,
      subject.subject_engname,
      student.student_id,
      student.student_fname,
      student.student_lname,
      study.study_status
      FROM study 
      INNER JOIN coursesopen ON study.study_coursesopen_id=coursesopen.coursesopen_id
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      INNER JOIN student ON study.study_student_id=student.student_id";
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['study_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr>  
                     <td width="30%"><label>รหัสนิสิต</label></td>  
                     <td width="70%">'.$row["student_id"].'</td>  
                </tr>   
                <tr>  
                     <td width="30%"><label>ชื่อ</label></td>   
                     <td width="70%">'.$row["student_fname"].'</td>  
                </tr>  
                <tr>  
                <td width="30%"><label>นามสกุล</label></td>  
                <td width="70%">'.$row["student_lname"].'</td>  
          </tr> 
               
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$status.'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
//  if ($row['preName_status'] == "1") {
//      echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
//   }
//  else{
//     echo "<a style='color:red;'>ปิดการใช้งาน</a>";
//  }
 ?>