<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
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
    $coursesopen_subject_id = $_POST["coursesopen_subject_id"];
    $coursesopen_term = clean($_POST["coursesopen_term"]);
	$coursesopen_schoolyear = $_POST["coursesopen_schoolyear"];
    $coursesopen_teacher_id =$_POST["coursesopen_teacher_id"];
    // $coursesopen_status = $_POST["coursesopen_status"];

    //เช็คข้อมูลซ้ำ
    $query = "SELECT coursesopen_subject_id FROM coursesopen 
    WHERE coursesopen_subject_id='$coursesopen_subject_id' AND coursesopen_term='$coursesopen_term' AND
    coursesopen_schoolyear='$coursesopen_schoolyear' AND coursesopen_teacher_id='$coursesopen_teacher_id'";
    $result = mysqli_query($conn, $query);
    if ($coursesopen_term=="" && $coursesopen_schoolyear="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }else{
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>0){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีรายวิชานี้อยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                                $sql1 = "INSERT INTO coursesopen(coursesopen_subject_id,coursesopen_term,coursesopen_schoolyear,coursesopen_teacher_id,coursesopen_status )
                                        VALUES ('$coursesopen_subject_id','$coursesopen_term','$coursesopen_schoolyear','$coursesopen_teacher_id',1)";
                                if(mysqli_query($conn, $sql1)){
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มรายวิชาที่เปิดสอนสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../opensubject.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                                }
                        }
                }
                 else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            }
mysqli_close($conn);
?> 
    </body>

</html>