<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    
<?php
 require('conn.php');
    mysqli_query($conn,"SET CHARACTER SET UTF8");  
    function clean($value){
        $value = trim($value);
        return $value; 
    }
    $preName_id=$_POST["preName_id"];
    $prename = clean($_POST["prename"]);
	$status_prename = $_POST["status_prename"];
//เช็คข้อมูลซ้ำ
    $query = "SELECT preName_name FROM prename WHERE preName_name='$prename'";
    $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>0){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีคำนำหน้าชื่อนี้อยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                            // $sql = "INSERT INTO prename(preName_name, preName_status)
                            //             VALUES ('$prename', '$status_prename')";  
                            $sql = "UPDATE prename SET preName_name='$prename' , preName_status=$status_prename WHERE preName_id=$preName_id";
                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขคำนำหน้าชื่อสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../Prename.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                        }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
     
// echo $prename;
// echo $status_prename;


mysqli_close($conn);
?> 
</body>
</html>