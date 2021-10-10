<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT live.live_id,subject.subject_engname,live.live_story,live.live_link,live.live_datetime 
      FROM live 
      INNER JOIN coursesopen ON live.live_coursesopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE live_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  

      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= '  
           <form action="../teacher/Edit/edit.php" method="post" >
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รหัสไลฟ์ :</label>
                    <input type="text" required class="form-control" name="live_id" style="font-family: Kanit, sans-serif;" value="'.$row["live_id"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'" readonly/>
                </div>
               <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อไลฟ์ :</label>
                    <input type="text" required class="form-control" name="live_story" style="font-family: Kanit, sans-serif;" value="'.$row["live_story"].'">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ลิงก์ไลฟ์ :</label>
                    <input type="text" required class="form-control" name="live_link" style="font-family: Kanit, sans-serif;" value="'.$row["live_link"].'">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลาไลฟ์ :</label>
                    <input type="text" required class="form-control" name="live_datetime" style="font-family: Kanit, sans-serif;" value="'.$row["live_datetime"].'" readonly/>
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