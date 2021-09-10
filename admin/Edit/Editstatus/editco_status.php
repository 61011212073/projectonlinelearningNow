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
    $course_thname = clean($_POST["course_thname"]);
    $course_engname = clean($_POST["course_engname"]);
    $course_thcode = clean($_POST["course_thcode"]);
	$course_engcode = clean($_POST["course_engcode"]);
    $course_year_mco2 = clean($_POST["course_year_mco2"]);
    $course_dpm_id = clean($_POST["course_dpm_id"]);
    $course_faculty_id = clean($_POST["course_faculty_id"]);
    $course_status = $_POST["course_status"];

    $query = "SELECT course_year_mco2 FROM course WHERE course_year_mco2='$course_year_mco2'";
    $result = mysqli_query($conn, $query);
    if ($course_thname==""&&$course_engname==""&&$course_thcode==""&&$course_engcode==""&&$course_year_mco2==""&&$course_dpm_id==""&&$course_faculty_id==""&&$course_status=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }else{
    if(mysqli_query($conn, $query)){
            if(mysqli_num_rows($result)>0){
               echo "<script type=\"text/javascript\">";
                echo "alert(\"มีหลักสูตรนี้อยู่แล้ว\");";
                echo "window.history.back();";
                echo "</script>";
                exit(); 
            }
            else{
                $sql1 = "UPDATE course SET course_thname='$course_thname',
                course_engname='$course_engname',
                course_thcode='$course_thcode',
                course_engcode='$course_engcode',
                course_year_mco2='$course_year_mco2',
                course_dpm_id='$course_dpm_id',
                course_faculty_id='$course_faculty_id',
                course_status='$course_status'
                WHERE course_id='$course_id'";
                
                mysqli_set_charset($conn, 'utf8');
                if(mysqli_query($conn, $sql1)){
                //    echo "Records added successfully.";
                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มหลักสูตรสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../../course.php");
                                echo "</script>";
                                exit();
                } else{
                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                }
            }
       } else{
           echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
       }
}






    

mysqli_close($conn);
?> 
    </body>
</html>