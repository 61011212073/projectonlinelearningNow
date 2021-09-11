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

    $student_id = clean($_POST["student_id"]);

	$student_status = $_POST["student_status"];

    // echo $student_id;

                            $sql = "UPDATE `student` SET `student_status`='$student_status' WHERE `student_id'='$student_id'";  

                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขสถานะการใช้งานสำเร็จ\");";
                                header("Refresh:0; url=../../student.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }

mysqli_close($conn);
?> 
</body>
</html>

   