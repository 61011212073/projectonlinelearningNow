 <?php  
 //fetch.php  
 require("conn.php");
 mysqli_query($conn,"SET CHARACTER SET UTF8");    
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM prename WHERE preName_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>