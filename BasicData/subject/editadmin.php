<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT subject.subject_id,subject.subject_engname,subject.subject_thname,subject_course_id,course.course_thname,
      subject.subject_detail_thai,subject.subject_detail_english,subject.subject_status
      FROM subject 
      INNER JOIN course ON subject.subject_course_id=course.course_id
      WHERE subject_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
    //   $output .= '  
    //   <div class="table-responsive">  
    //        <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['subject_status'] == "1") {
               $status="<input type='radio' name='subject_status' checked value='1'> เปิดการใช้งาน
               <input type='radio' name='subject_status'value='0'> ปิดการใช้งาน";
            }
           else{
               $status="<input type='radio' name='subject_status' value='1'> เปิดการใช้งาน
               <input type='radio' name='subject_status' checked value='0'> ปิดการใช้งาน";
           }  
           $uni_id=$row["subject_course_id"];
           $uni_name=$row["course_thname"];
           $sta='
           <select class="form-select form-control" aria-label="Default select example" name="subject_course_id" disabled="true">
                        <option value="'.$uni_id.'">'.$uni_name.'</option></select>';
           $output .= '  
                <form class="row g-3 needs-validation" novalidate action="../admin/Edit/editsj.php" method="post">
                        <div>
                              <label for="validationCustom01" class="form-label" >รหัสวิชา</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="subject_id" value="'.$row["subject_id"].'" readonly/>
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >ชื่อวิชาภาษาอังกฤษ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="subject_engname" value="'.$row["subject_engname"].'" >
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >ชื่อวิชาภาษาไทย</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="subject_thname" value="'.$row["subject_thname"].'" >
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >หลักสูตร</label>'.$sta.'
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >รายละเอียดภาษาไทย</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="subject_detail_thai" value="'.$row["subject_detail_thai"].'">
                        </div>
                        <div>
                              <label for="validationCustom01" class="form-label" >รายละเอียดภาษาอังกฤษ</label>
                              <input type="text" class="form-control th" id="validationCustom01" placeholder="กรอกคำนำหน้าชื่อ" required name="subject_detail_english" value="'.$row["subject_detail_english"].'">
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