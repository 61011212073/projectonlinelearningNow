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
    $faculty_id=$_POST['faculty_id'];

	$faculty_status = $_POST["faculty_status"];

                        $sql1 = "UPDATE faculty SET faculty_status='$faculty_status' WHERE faculty_id='$faculty_id'";
                        
                        if(mysqli_query($conn, $sql1)){
                        //    echo "Records added successfully.";
                        echo "<script type=\"text/javascript\">";
                        echo "alert(\"แก้ไขสถานะการใช้งานสำเร็จ\");";
                        // echo "window.history.back();";
                        header("Refresh:0; url=../../faculty.php");
                        echo "</script>";
                        exit();
                        } else{
                            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                        }

mysqli_close($conn);
?> 
    </body>
</html>