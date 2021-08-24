<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require("conn.php");
      mysqli_query($conn,"SET CHARACTER SET UTF8");  
      $query = "SELECT * FROM univercity WHERE univercity_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
          if ($row['univercity_status'] == "1") {
               $status="<a style='color:#228B22;'>เปิดการใช้งาน</a>";
            }
           else{
               $status= "<a style='color:red;'>ปิดการใช้งาน</a>";
           } 
           $output .= '  
                <tr>  
                     <td width="30%"><label>คำนำหน้าชื่อ</label></td>  
                     <td width="70%">'.$row["univercity_thname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["univercity_engname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["univercity_thcode"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>สถานะ</label></td>  
                     <td width="70%">'.$row["univercity_engcode"].'</td>  
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