<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT vdo.vdo_id,subject.subject_engname,vdo.vdo_name,vdo_link,	vdo_datetime,vdo_status 
      FROM vdo 
      INNER JOIN coursesopen ON vdo.vdo_coursesopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE vdo_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  

      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= '  
           <form action="./teacher/Edit/edit.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รหัสวีดีทัศน์ :</label>
                    <input type="text" required class="form-control" name="vdo_id" style="font-family: Kanit, sans-serif;" value="'.$row["vdo_id"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อวีดีทัศน์ :</label>
                    <input type="text" required class="form-control" name="vdo_name" style="font-family: Kanit, sans-serif;" value="'.$row["vdo_name"].'" >
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ไฟล์วีดีทัศน์ :</label>
                    <input type="text" required class="form-control" name="vdo_link" style="font-family: Kanit, sans-serif;" value="'.$row["vdo_link"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลา :</label>
                    <input type="text" required class="form-control" name="vdo_datetime" style="font-family: Kanit, sans-serif;" value="'.$row["vdo_datetime"].'" readonly/>
                </div><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit" style="font-family: Kanit, sans-serif;">แก้ไข</button>
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