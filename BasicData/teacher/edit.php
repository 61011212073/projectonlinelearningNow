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
      teacher.teacher_password
      FROM teacher 
      INNER JOIN prename ON teacher.teacher_prename_id =prename.preName_id INNER JOIN univercity ON teacher.teacher_univercity_id=univercity.univercity_id 
      INNER JOIN faculty ON teacher.teacher_faculty_id =faculty.faculty_id 
      INNER JOIN department ON teacher.teacher_department_id=department.department_id
      WHERE teacher_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);   
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
           <form class="row g-3 needs-validation" novalidate action="../admin/Edit/editlac.php" method="post">
                <div >
                    <label for="validationCustom01" class="form-label" >เลขประจำตัวประชาชน :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_id_id"].'" required name="teacher_id_id" readonly/>
                </div>  
                <div >
                    <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["preName_name"].'" required name="preName_name" readonly/>
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >ชื่อ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_fname"].'" required name="teacher_fname" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >นามสกุล :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_lname"].'" required name="teacher_lname" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >เบอร์โทร :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_phone"].'" required name="teacher_phone" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >อีเมล์ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_email"].'" required name="teacher_email" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >มหาวิทยาลัย :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["univercity_thname"].'" required name="univercity_thname" readonly/>
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >คณะ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["faculty_name"].'" required name="faculty_name" readonly/>
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >ภาควิชา :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["department_name"].'" required name="department_name" readonly/>
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >ชื่อผู้ใช้ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_username"].'" required name="teacher_username" >
                </div>
                <div >
                    <label for="validationCustom01" class="form-label" >รหัสผ่าน :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["teacher_password"].'" required name="teacher_password" >
                </div>
                <br>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="แก้ไขข้อมูล">
                </div>
                </form>
           ';  
      }  
      echo $output;  
 }  
//  if ($row['preName_status'] == "1") {
//      echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
//   }
//  else{
//     echo "<a style='color:red;'>ปิดการใช้งาน</a>";
//  }
 ?>