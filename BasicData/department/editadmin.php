<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT department.department_id,department_univarcity_id,univercity.univercity_thname,faculty.faculty_name,department_faculty_id,department.department_name,department.department_status
      FROM department
      INNER JOIN univercity ON department.department_univarcity_id=univercity.univercity_id
      INNER JOIN faculty ON department.department_faculty_id=faculty.faculty_id  WHERE department_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
    //   $output .= '  
    //   <div class="table-responsive">  
    //        <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['department_status'] == "1") {
               $status="<input type='radio' name='department_status' checked value='1'> เปิดการใช้งาน
               <input type='radio' name='department_status'value='0'> ปิดการใช้งาน";
            }
           else{
               $status="<input type='radio' name='department_status' value='1'> เปิดการใช้งาน
               <input type='radio' name='department_status' checked value='0'> ปิดการใช้งาน";
           }  
           $uni_id=$row["department_univarcity_id"];
           $uni_name=$row["univercity_thname"];
           $sta='
           <select class="form-select form-control" aria-label="Default select example" name="department_univarcity_id" disabled="true">
                        <option value="'.$uni_id.'">'.$uni_name.'</option></select>';

           $uni_id1=$row["department_faculty_id"];
           $uni_name1=$row["faculty_name"];
           $sta1='
           <select class="form-select form-control" aria-label="Default select example" name="department_faculty_id" disabled="true">
                        <option value="'.$uni_id1.'">'.$uni_name1.'</option></select>';
           $output .= '  
                <form class="row g-3 needs-validation" novalidate action="../admin/Edit/editdpm.php" method="post">
                        <div>
                              <label for="validationCustom01" class="form-label" >รหัสภาควิชา</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="department_id" value="'.$row["department_id"].'" readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >ชื่อภาควิชา</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="department_name" value="'.$row["department_name"].'">
                        </div>
                        <div>
                        <label for="validationCustom01" class="form-label" >คณะ</label>'.$sta1.'
                       <!-- <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="faculty_name" value="'.$row["faculty_name"].'"readonly/>-->
                  </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>'.$sta.'
                              <!--<input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="univercity_thname" value="'.$row["univercity_thname"].'"readonly/>-->
                        </div>
                        <!--<div>
                              <label for="validationCustom01" class="form-label" >สถานะการใช้งาน</label>
                              '.$status.'
                        </div>-->
                    
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