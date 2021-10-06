<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT news_id,news_name,news_detail,news_date,teacher.teacher_fname,teacher.teacher_lname 
      FROM news 
      INNER JOIN teacher ON news.news_teacher=teacher.teacher_id
      WHERE news_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  

      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= '  
           <form action="../teacher/Edit/edit.php" method="post" >
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รหัสข่าวสาร :</label>
                    <input type="text" required class="form-control" name="news_id" style="font-family: Kanit, sans-serif;" value="'.$row["news_id"].'" readonly/>
                </div>
                <div class="form-group" style="font-family: Kanit, sans-serif;">
                    <label for="usr" style="font-family: Kanit, sans-serif;">ชื่อเรื่อง :</label>
                    <input type="text" required class="form-control" name="news_name" style="font-family: Kanit, sans-serif;" value="'.$row["news_name"].'">
                </div>
               <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">รายละเอียด :</label>
                    <textarea class="form-control" required name="news_detail" cols="10" rows="10" style="font-family: Kanit, sans-serif;">'.$row["news_detail"].'</textarea>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">วันและเวลา :</label>
                    <input type="text" required class="form-control" name="news_date" style="font-family: Kanit, sans-serif;" value="'.$row["news_date"].'" readonly/>
                </div>
                <div class="form-group">
                    <label for="usr" style="font-family: Kanit, sans-serif;">อาจารย์ :</label>
                    <input type="text" required class="form-control" name="" style="font-family: Kanit, sans-serif;" value="'.$row["teacher_fname"].' '.$row["teacher_lname"].'" readonly/>
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