<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT * FROM univercity WHERE univercity_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      // $output .= '  
      // <div class="table-responsive">  
      //      <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['univercity_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           
           $output .= '  
           <div class="modal-body">
           <form class="row g-3 needs-validation" novalidate action="../teacher/Edit/edituni.php" method="post">
           <div>
             <label for="validationCustom01" class="form-label" >รหัสมหาวิทยาลัย</label>
             <input type="text" class="form-control only" name="univercity_id" id="validationCustom01" value="'.$row["univercity_id"].'" readonly/>
           </div><br>
           <div>
             <label for="validationCustom01" class="form-label" >ชื่อมหาวิทยาลัยภาษาไทย</label>
             <input type="text" class="form-control only" name="univercity_thname" id="validationCustom01" value="'.$row["univercity_thname"].'" required >
           </div><br>
           <div>
             <label for="validationCustom01" class="form-label" >ชื่อมหาวิทยาลัยภาษาอังกฤษ</label>
             <input type="text" class="form-control only" name="univercity_engname" id="validationCustom01" value="'.$row["univercity_engname"].'" required >
           </div><br>
           <div >
               <label for="validationCustom01" class="form-label" >ตัวย่อมหาวิทยาลัย(ภาษาไทย)</label>
               <input type="text" class="form-control only" name="univercity_thcode" id="validationCustom01" value="'.$row["univercity_thcode"].'" required >
             </div><br>
             <div >
               <label for="validationCustom01" class="form-label" >ตัวย่อมหาวิทยาลัย(ภาษาอังกฤษ)</label>
               <input type="text" class="form-control onlys" name="univercity_engcode" id="validationCustom01" value="'.$row["univercity_engcode"].'" required >
             </div><br>
           <div class="modal-footer">
         <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
       </div>
         </form>
         </div>
           ';  
      }  
      // $output .= '  
      //      </table>  
      // </div>  
      // ';  
      echo $output;  
 }  
//  if ($row['preName_status'] == "1") {
//      echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
//   }
//  else{
//     echo "<a style='color:red;'>ปิดการใช้งาน</a>";
//  }
 ?>