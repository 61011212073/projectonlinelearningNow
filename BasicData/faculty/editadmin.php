<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      $query = "SELECT faculty_id,faculty_uivarcity_id,univercity.univercity_thname,faculty.faculty_name,faculty.faculty_status 
      FROM faculty
      INNER JOIN univercity ON faculty.faculty_uivarcity_id=univercity.univercity_id
      WHERE faculty_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
    //   $output .= '  
    //   <div class="table-responsive">  
    //        <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['faculty_status'] == "1") {
               $status="<input type='radio' name='faculty_status' checked value='1'> เปิดการใช้งาน
               <input type='radio' name='faculty_status'value='0'> ปิดการใช้งาน";
            }
           else{
               $status="<input type='radio' name='faculty_status' value='1'> เปิดการใช้งาน
               <input type='radio' name='faculty_status' checked value='0'> ปิดการใช้งาน";
           }  
           $uni_id=$row["faculty_uivarcity_id"];
           $uni_name=$row["univercity_thname"];
           $sta='
           <select class="form-select form-control" aria-label="Default select example" name="faculty_uivarcity_id"">
                        <option value="'.$uni_id.'">'.$uni_name.'</option></select>';
           $output .= '  
                <form class="row g-3 needs-validation" novalidate action="../admin/Edit/editfa.php" method="post">
                        <div>
                              <label for="validationCustom01" class="form-label" >รหัสคณะ</label>
                              <input type="text" class="form-control th" id="validationCustom01" name="faculty_id" value="'.$row["faculty_id"].'" readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >มหาวิทยาลัย</label>'.$sta.'
                              <!--<input type="text" class="form-control th" id="validationCustom01" required name="univercity_thname" value="'.$row["univercity_thname"].'" readonly/>-->
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >คณะ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคณะ" required name="faculty_name" value="'.$row["faculty_name"].'">
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