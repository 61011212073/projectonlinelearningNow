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

	$status_prename = $_POST["preName_status"];

                $sql = "UPDATE prename SET preName_status=$status_prename WHERE preName_id=$preName_id";
                    mysqli_set_charset($conn, 'utf8');     
                    if(mysqli_query($conn, $sql)){
                    
                    //    echo "Records added successfully.";
                    echo "<script type=\"text/javascript\">";
                    echo "alert(\"แก้ไขสถานะการใช้งานสำเร็จ\");";
                    // echo "window.history.back();";
                    // header("Refresh:0; url=../Prename.php");
                    header("Refresh:0; url=../../Prename.php");
                    echo "</script>";
                    exit();
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

mysqli_close($conn);
?> 
</body>
</html>