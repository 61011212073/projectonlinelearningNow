<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT subject.subject_engname,work_id,work_name,work_detail,work_file,work_date,work_enddate,work_status 
      FROM work 
      INNER JOIN coursesopen ON work.work_courseopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE work_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  

      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= '  
           <form action="./teacher/Edit/edit.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รหัสงาน :</label>
                    <input type="text" required class="form-control" name="work_id" style="font-family: Kanit, sans-serif;" value="'.$row["work_id"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'" readonly/>
                </div>
               <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อแบบฝึกหัด :</label>
                    <input type="text" required class="form-control" name="work_name" style="font-family: Kanit, sans-serif;" value="'.$row["work_name"].'">
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายละเอียดแบบฝึกหัด :</label>
                    <textarea class="form-control" required name="work_detail" cols="10" rows="10" style="font-family: Kanit, sans-serif;">'.$row["work_detail"].'</textarea>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ไฟล์แบบฝึกหัด :</label>
                    <input type="text" required class="form-control" name="work_file" style="font-family: Kanit, sans-serif;" value="'.$row["work_file"].'" readonly/>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลาสั่ง :</label>
                    <input type="text" required class="form-control" name="work_date" style="font-family: Kanit, sans-serif;" value="'.$row["work_date"].'" readonly/>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลาส่ง :</label>
                    <input type="datetime-local" required class="form-control" name="work_enddate" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'">
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