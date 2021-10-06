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
      $output .= '  
      <div class="table-responsive">   
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {   
           $output .= '  
                <tr>  
                     <td width="30%"><label>รายวิชา</label></td>  
                     <td width="70%">'.$row["subject_engname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ชื่อเรื่อง</label></td>  
                     <td width="70%">'.$row["live_story"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ไฟล์ไลฟ์</label></td>  
                     <td width="70%"><a href="'.$row["live_link"].'">รับชม</a></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>วันและเวลา</label></td>  
                     <td width="70%">'.$row["live_datetime"].'</td>  
                </tr>     
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
//  if ($row['preName_status'] == "1") {
//      echo "<a style='color:#228B22;'>เปิดการใช้งาน</a>";
//   }
//  else{
//     echo "<a style='color:red;'>ปิดการใช้งาน</a>";
//  }
 ?>