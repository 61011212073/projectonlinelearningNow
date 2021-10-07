<?php  

    // echo $_POST["employee_id"].' '.$_POST["username"];
 if(isset($_POST["employee_id"]) && isset($_POST["username"]))  
 {  
      $username=$_POST["username"];
      $id=$_POST["employee_id"];
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT subject.subject_engname,work_id,work_name,work_detail,work_file,work_date,work_enddate,work_status 
      FROM work 
      INNER JOIN coursesopen ON work.work_courseopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE work_id='$id'";
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_array($result)) {
        $output .= '  
        <form action="../teacher/Add/add.php" method="post" enctype="multipart/form-data" >
             <div class="form-group" style="font-family: Kanit, sans-serif;">
                 <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อผู้ใช้(username) :</label>
                 <input type="text" required class="form-control" name="sendwork_student_id" style="font-family: Kanit, sans-serif;" value="'.$username.'" readonly/>
             </div>
             <div class="form-group" style="font-family: Kanit, sans-serif;">
                 <label for="usr" style="font-family: Kanit, sans-serif;">รายวิชาที่เปิดสอน :</label>
                 <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'" readonly/>
             </div>
            <div class="form-group">
                 <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อแบบฝึกหัด :</label>
                 <select class="form-select form-control" name="sendwork_workorder" style="font-family: Kanit, sans-serif;">
                    <option style="font-family: Kanit, sans-serif;" value="'.$row["work_id"].'">'.$row["work_name"].'</option>
                    </select>
             </div>
             <div class="form-group">
                 <label for="usr" style="font-family: Kanit, sans-serif;">ส่งไฟล์แบบฝึกหัด :</label>
                 <input type="file" required class="form-control" name="sendwork_sendwork" style="font-family: Kanit, sans-serif;">
             </div><br>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary" name="submit" style="font-family: Kanit, sans-serif;">ส่งงาน</button>
             </div>
         </form>
        ';  
      }
       
     
      echo $output;  
    //   echo $_POST["employee_id"].' '.$_POST["username"];
 }  
//  if ($row['preName_status'] == "1") {
//      echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
//   }
//  else{
//     echo "<a style='color:red;'>ปิดการใช้งาน</a>";
//  }
 ?>