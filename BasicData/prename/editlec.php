<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT * FROM prename WHERE preName_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
    //   $output .= '  
    //   <div class="table-responsive">  
    //        <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['preName_status'] == "1") {
               $status="<input type='radio' name='preName_status' checked value='1'> เปิดการใช้งาน
               <input type='radio' name='preName_status'value='0'> ปิดการใช้งาน";
            }
           else{
               $status="<input type='radio' name='preName_status' value='1'> เปิดการใช้งาน
               <input type='radio' name='preName_status' checked value='0'> ปิดการใช้งาน";
           }  
           $output .= '  
                <form class="row g-3 needs-validation" novalidate action="../teacher/Edit/editpre.php" method="post">
                        <div>
                              <label for="validationCustom01" class="form-label" >รหัสคำนำหน้าชื่อ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="preName_id" value="'.$row["preName_id"].'" readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >คำนำหน้าชื่อ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="prename" value="'.$row["preName_name"].'">
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