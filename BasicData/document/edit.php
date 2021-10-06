<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT document.document_id,subject.subject_engname,document_coursesopen_id,document.document_name,document.document_file,document.document_datetime,document_status 
      FROM document 
      INNER JOIN coursesopen ON document.document_coursesopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE document_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  

      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= '  
           <form action="./teacher/Edit/edit.php" method="post" enctype="multipart/form-data" >
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รหัสเอกสาร :</label>
                    <input type="text" required class="form-control" name="document_id" style="font-family: Kanit, sans-serif;" value="'.$row["document_id"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายวิชาที่เปิดสอน :</label>
                    <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["subject_engname"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อเอกสาร :</label>
                    <input type="text" required class="form-control" name="document_name" style="font-family: Kanit, sans-serif;" value="'.$row["document_name"].'" >
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ไฟล์เอกสาร :</label>
                    <input type="text" required class="form-control" name="document_file" style="font-family: Kanit, sans-serif;" value="'.$row["document_file"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลา :</label>
                    <input type="text" required class="form-control" name="document_datetime" style="font-family: Kanit, sans-serif;" value="'.$row["document_datetime"].'" readonly/>
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