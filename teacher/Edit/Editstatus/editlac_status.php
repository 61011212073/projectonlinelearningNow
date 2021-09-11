<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</style>
</head>
<body>
<?php
 require('conn.php');
    mysqli_query($conn,"SET CHARACTER SET UTF8");  
    function clean($value){
        $value = trim($value);
        return $value; 
    }

    $teacher_id =$_POST["teacher_id"];

	$teacher_status = $_POST["teacher_status"];


                            $sql = "UPDATE `teacher` SET `teacher_status`='$teacher_status' WHERE `teacher_id`='$teacher_id'";  
                            
                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขสถานะการใช้งานสำเร็จ\");";
                                 header("Refresh:0; url=../../teacher.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }

mysqli_close($conn);
?> 
</body>
</html>

   