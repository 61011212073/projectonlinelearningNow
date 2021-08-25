<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT subject.subject_engname,subject.subject_thname,course.course_thname,subject.subject_detail_thai,subject.subject_detail_english,subject.subject_status
      FROM subject 
      INNER JOIN course ON subject.subject_course_id=course.course_id
      WHERE subject_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['subject_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr >  
                     <td width="30%"><label>ชื่อภาษาอังกฤษ</label></td>  
                     <td width="70%">'.$row["subject_engname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ชื่อภาษาไทย</label></td>  
                     <td width="70%">'.$row["subject_thname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>หลักสูตร</label></td>  
                     <td width="70%">'.$row["course_thname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>คำอธิบาย(ภาษาไทย)</label></td>  
                     <td width="70%">'.$row["subject_detail_thai"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>คำอธิบาย(ภาษาอังกฤษ)</label></td>  
                     <td width="70%">'.$row["subject_detail_english"].'</td>  
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