<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT teacher.teacher_prename_id,
      teacher.teacher_id,
      teacher.teacher_id_id ,
      teacher.teacher_univercity_id,
      teacher.teacher_faculty_id,
      teacher.teacher_department_id,
      prename.preName_name,
      teacher.teacher_fname,
      teacher.teacher_lname,
      teacher.teacher_phone,
      teacher.teacher_email,
      univercity.univercity_thname,
      faculty.faculty_name,
      department.department_name,
      teacher.teacher_username,
      teacher.teacher_password,
      teacher.teacher_status
      FROM teacher 
      INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
      INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
      INNER JOIN department ON teacher.teacher_department_id=department.department_id
      WHERE teacher_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['teacher_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr >  
                     <td width="30%"><label>เลขประจำตัวประชาชน</label></td>  
                     <td width="70%">'.$row["teacher_id_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>คำนำหน้าชื่อ</label></td>  
                     <td width="70%">'.$row["preName_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ชื่อ</label></td>  
                     <td width="70%">'.$row["teacher_fname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>นามสกุล</label></td>  
                     <td width="70%">'.$row["teacher_lname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>เบอร์โทร</label></td>  
                     <td width="70%">'.$row["teacher_phone"].'</td>  
                </tr>   
                <tr>  
                    <td width="30%"><label>อีเมลล์</label></td>  
                    <td width="70%">'.$row["teacher_email"].'</td>  
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
                    <td width="70%">'.$row["teacher_username"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>รหัสผ่าน</label></td>  
                    <td width="70%">'.$row["teacher_password"].'</td>  
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