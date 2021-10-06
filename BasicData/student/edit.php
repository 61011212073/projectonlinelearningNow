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
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
            <form class="row g-3 needs-validation" novalidate action="../admin/Edit/editstd.php" method="post">
                <div >
                    <label for="validationCustom01" class="form-label" >รหัสนิสิต :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_id"].'" required name="student_id" readonly/>
                </div>  
                <div >
                    <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["preName_name"].'" required name="preName_name" readonly/>
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >ชื่อ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_fname"].'" required name="student_fname" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >นามสกุล :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_lname"].'" required name="student_lname" >
                </div>
                <div >
                    <label for="validationCustom01" class="form-label" >เบอร์โทร :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_phone"].'" required name="student_phone" >
                </div>
                <div >
                    <label for="validationCustom01" class="form-label" >เฟสบุ๊ค :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_facebook"].'" required name="student_facebook" readonly/>
                </div>
                <div >
                    <label for="validationCustom01" class="form-label" >อีเมล์ :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_email"].'" required name="student_email" >
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
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_username"].'" required name="student_username" >
                </div> 
                <div >
                    <label for="validationCustom01" class="form-label" >รหัสผ่าน :</label>
                    <input type="text" class="form-control" id="validationCustom01" value="'.$row["student_password"].'" required name="student_password" >
                </div> <br>
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