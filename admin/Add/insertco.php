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
    $course_thname = clean($_POST["course_thname"]);
    $course_engname = clean($_POST["course_engname"]);
    $course_thcode = clean($_POST["course_thcode"]);
	$course_engcode = clean($_POST["course_engcode"]);
    $course_year_mco2 = clean($_POST["course_year_mco2"]);
    $course_univercity_id =$_POST["course_univercity_id"];
    $course_dpm_id = clean($_POST["course_dpm_id"]);
    $course_faculty_id = clean($_POST["course_faculty_id"]);
    // $course_status = $_POST["course_status"];

    // echo $course_univercity_id;

    $query = "SELECT course_year_mco2 FROM course 
    WHERE course_year_mco2='$course_year_mco2' AND
    course_thname='$course_thname' AND course_engname='$course_engname' 
    AND  course_thcode='$course_thcode' AND
    course_engcode='$course_engcode' 
    ";
    $result = mysqli_query($conn, $query);
    if ($course_thname==""&&$course_engname==""&&$course_thcode==""&&$course_engcode==""&&$course_year_mco2==""&&$course_dpm_id==""&&$course_faculty_id=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
        exit();
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
                $sql1 = "INSERT INTO course(course_thname,course_engname,course_thcode,course_engcode,course_year_mco2,course_univercity_id,course_dpm_id,course_faculty_id,course_status )
                 VALUES ('$course_thname','$course_engname','$course_thcode','$course_engcode','$course_year_mco2','$course_univercity_id','$course_dpm_id','$course_faculty_id',1)";
                mysqli_set_charset($conn, 'utf8');
                if(mysqli_query($conn, $sql1)){
                //    echo "Records added successfully.";
                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มหลักสูตรสำเร็จ\");";
                                echo "window.history.back();";
                                header("Refresh:0; url=../course.php");
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