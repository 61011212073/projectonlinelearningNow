<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT student.student_id,
      prename.preName_name,
      student.student_fname,
      student.student_lname,
      student.student_phone,
      student.student_facebook,
      student.student_email,
      univercity.univercity_thname,
      faculty.faculty_name,
      department.department_name,
      student.student_username,
      student.student_password,
      student.student_status 
      FROM student 
      INNER JOIN prename ON student.student_prename_id =prename.preName_id 
      INNER JOIN univercity ON student.student_univercity_id=univercity.univercity_id 
      INNER JOIN faculty ON student.student_faculty_id =faculty.faculty_id 
      INNER JOIN department ON student.student_department_id=department.department_id
      WHERE student_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['student_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr >  
                     <td width="30%"><label>รหัสนิสิต</label></td>  
                     <td width="70%">'.$row["student_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>คำนำหน้าชื่อ</label></td>  
                     <td width="70%">'.$row["preName_name"].'</td>  
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
                     <td width="30%"><label>เบอร์โทร</label></td>  
                     <td width="70%">'.$row["student_phone"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>เฟสบุ๊ค</label></td>  
                     <td width="70%">'.$row["student_facebook"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>อีเมลล์</label></td>  
                    <td width="70%">'.$row["student_email"].'</td>  
                 </tr>   
                <tr>  
                    <td width="30%"><label>มหาวิทยาลัย</label></td>  
                    <td width="70%">'.$row["univercity_thname"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>คณะ</label></td>  
                    <td width="70%">'.$row["faculty_name"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>ภาควิชา</label></td>  
                    <td width="70%">'.$row["department_name"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>ชื่อผุ้ใช้</label></td>  
                    <td width="70%">'.$row["student_username"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>รหัสผ่าน</label></td>  
                    <td width="70%">'.$row["student_password"].'</td>  
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