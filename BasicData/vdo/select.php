<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT vdo.vdo_id,subject.subject_engname,vdo.vdo_name,vdo_link,vdo_datetime,vdo_status 
      FROM vdo 
      INNER JOIN coursesopen ON vdo.vdo_coursesopen_id=coursesopen.coursesopen_id 
      INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
      WHERE vdo_id= '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">   
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {   
          if ($row['vdo_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr>  
                     <td width="30%"><label>รายวิชา</label></td>  
                     <td width="70%">'.$row["subject_engname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ชื่อวีดีทัศน์</label></td>  
                     <td width="70%">'.$row["vdo_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ไฟล์ประกอบการสอน</label></td>  
                     <td width="70%"><a href="uploadvdo/'.$row["vdo_link"].'">'.$row["vdo_link"].'</a></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>วันและเวลา</label></td>  
                     <td width="70%">'.$row["vdo_datetime"].'</td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$status.'</td>  
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