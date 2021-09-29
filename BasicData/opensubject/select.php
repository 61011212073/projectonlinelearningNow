<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $sql11="SELECT subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
      FROM coursesopen 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
      INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id";
      $result=mysqli_query($conn,$sql11);
    
    
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result) {  
          if ($row['coursesopen_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr >  
                     <td width="30%"><label>รหัสรายวิช</label></td>  
                     <td width="70%">'.$row["coursesopen_subject_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ภาคการศึกษา</label></td>  
                     <td width="70%">'.$row["coursesopen_term"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ปีการศึกษา</label></td>  
                     <td width="70%">'.$row["coursesopen_schoolyear"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>อาจารย์ผู้สอน</label></td>  
                     <td width="70%">'.$row["teacher_fname"].'</td>  
                </tr>  
                
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$status.'</td>  
                </tr>  
           ';  
      }  }
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