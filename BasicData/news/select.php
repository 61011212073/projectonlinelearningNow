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
      $output .= '  
      <div class="table-responsive">   
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {   
           $output .= '  
                <tr>  
                     <td width="30%"><label>ชื่อเรื่อง</label></td>  
                     <td width="70%">'.$row["news_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>รายละเอียด</label></td>  
                     <td width="70%">'.$row["news_detail"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>วันและเวลา</label></td>  
                     <td width="70%">'.$row["news_date"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>อาจารย์</label></td>  
                     <td width="70%">'.$row["teacher_fname"].' '.$row["teacher_lname"].'</td>  
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