<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT course.course_id,course.course_thname,course.course_engname,course.course_thcode,course.course_engcode,course.course_year_mco2,univercity.univercity_thname,faculty.faculty_name,department.department_name,course.course_status 
      FROM course 
      INNER JOIN univercity ON course.course_univercity_id=univercity.univercity_id 
      INNER JOIN department ON course.course_dpm_id=department.department_id 
      INNER JOIN faculty ON course.course_faculty_id=faculty.faculty_id WHERE course_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
    //   $output .= '  
    //   <div class="table-responsive">  
    //        <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['course_status'] == "1") {
               $status="<input type='radio' name='course_status' checked value='1'> เปิดการใช้งาน
               <input type='radio' name='course_status'value='0'> ปิดการใช้งาน";
            }
           else{
               $status="<input type='radio' name='course_status' value='1'> เปิดการใช้งาน
               <input type='radio' name='course_status' checked value='0'> ปิดการใช้งาน";
           }  
           $output .= '  
                <form class="row g-3 needs-validation" novalidate action="../admin/Edit/Editstatus/editco_status.php" method="post">
                        <div>
                              <label for="validationCustom01" class="form-label" >รหัสหลักสูตร</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_id" value="'.$row["course_id"].'" readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาไทย</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_thname" value="'.$row["course_thname"].'"readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >ชื่อหลักสูตรภาษาอังกฤษ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_engname" value="'.$row["course_engname"].'"readonly/>
                        </div>
                        <div>
                        <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาไทย</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_thcode" value="'.$row["course_thcode"].'"readonly/>
                  </div>
                  <div>
                        <label for="validationCustom01" class="form-label" >ตัวย่อหลักสูตรภาษาอังกฤษ</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_engcode" value="'.$row["course_engcode"].'"readonly/>
                  </div>
                  <div>
                        <label for="validationCustom01" class="form-label" >ปีของหลักสูตรปรับปรุง</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="course_year_mco2" value="'.$row["course_year_mco2"].'"readonly/>
                  </div>
                  <div>
                        <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="univercity_thname" value="'.$row["univercity_thname"].'"readonly/>
                  </div>
                  <div>
                        <label for="validationCustom01" class="form-label" >คณะ</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="faculty_name" value="'.$row["faculty_name"].'"readonly/>
                  </div>
                  <div>
                        <label for="validationCustom01" class="form-label" >ภาควิชา</label>
                        <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="department_name" value="'.$row["department_name"].'"readonly/>
                  </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >สถานะการใช้งาน</label>
                              '.$status.'
                        </div>
                    
                    <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="บันทึกข้อมูล">
                    </div>
                </form> 
           ';  
      }  
    //   $output .= '  
    //        </table>  
    //   </div>  
    //   ';  
      echo $output;  
 }  

 ?>