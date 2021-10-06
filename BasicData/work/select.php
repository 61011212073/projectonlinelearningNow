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
      $output .= '  
      <div class="table-responsive">   
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {   
          if ($row['work_status'] == "1") {
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
                     <td width="30%"><label>ชื่องาน</label></td>  
                     <td width="70%">'.$row["work_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ไฟล์งาน</label></td>  
                     <td width="70%"><a href="uploadwork/'.$row["work_file"].'">'.$row["work_file"].'</a></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>รายละเอียดงาน</label></td>  
                     <td width="70%">'.$row["work_detail"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>วันและเวลาสั่งงาน</label></td>  
                     <td width="70%">'.$row["work_date"].'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>วันและเวลาส่งงาน</label></td>  
                     <td width="70%">'.$row["work_enddate"].'</td>  
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