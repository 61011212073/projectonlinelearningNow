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
    $course_id=$_POST['course_id'];

    $course_status = $_POST["course_status"];

   
                $sql1 = "UPDATE course SET course_status='$course_status' WHERE course_id='$course_id'";
                
                mysqli_set_charset($conn, 'utf8');
                if(mysqli_query($conn, $sql1)){
                //    echo "Records added successfully.";
                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขสถานะการใช้งานสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../../course.php");
                                echo "</script>";
                                exit();
                } 
                else{
                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                }





    

mysqli_close($conn);
?> 
    </body>
</html>