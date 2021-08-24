<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT course.course_thname,course.course_engname,course.course_thcode,course.course_engcode,course.course_year_mco2,univercity.univercity_thname,faculty.faculty_name,department.department_name,course.course_status 
      FROM course 
      INNER JOIN univercity ON course.course_univercity_id=univercity.univercity_id 
      INNER JOIN department ON course.course_dpm_id=department.department_id 
      INNER JOIN faculty ON course.course_faculty_id=faculty.faculty_id
      WHERE course_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['course_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           }  
           $output .= '  
                <tr>  
                     <td width="30%"><label>ชื่อหลักสูตรภาษาไทย</label></td>  
                     <td width="70%">'.$row["course_thname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ชื่อหลักสูตรภาษาอังกฤษ</label></td>  
                     <td width="70%">'.$row["course_engname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["course_thcode"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["course_engcode"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["course_year_mco2"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["univercity_thname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["faculty_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["department_name"].'</td>  
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