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
    $study_coursesopen_id = $_POST["study_coursesopen_id"];
    $study_student_id = clean($_POST["study_student_id"]);
    // $study_status = $_POST["study_status"];

    //เช็คข้อมูลซ้ำ
    $query = "SELECT student_id FROM student WHERE student_id='$study_student_id'";
    $result = mysqli_query($conn, $query);
    if ($study_coursesopen_id=="" && $study_student_id="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }
    else if (mysqli_num_rows($result)<1) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"ไม่พบนิสิตคนนี้\");";
        echo "window.history.back();";
        echo "</script>";
    }
    // else if (mysqli_num_rows($result)>1) {
    //     echo "<script type=\"text/javascript\">";
    //     echo "alert(\"มี\");";
    //     echo "window.history.back();";
    //     echo "</script>";
    // }
    else{
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>1){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีนิสิตคนนี้อยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                                // $sql1 = "INSERT INTO study(study_coursesopen_id,study_student_id,study_status)
                                //         VALUES ('$study_coursesopen_id','$study_student_id',1)";
                                // if(mysqli_query($conn, $sql1)){
                                // //    echo "Records added successfully.";
                                // echo "<script type=\"text/javascript\">";
                                // echo "alert(\"เพิ่มนิสิตรายวิชาสำเร็จ\");";
                                // // echo "window.history.back();";
                                // header("Refresh:0; url=../addstudentinsubject.php");
                                // echo "</script>";
                                // exit();
                                // } else{
                                //     echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                                // }
                        }
                 
        }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
    }
mysqli_close($conn);
?> 
    </body>
</html>