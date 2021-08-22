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
    $subject_id = clean($_POST["subject_id"]);
    $subject_engname = clean($_POST["subject_engname"]);
    $subject_thname = clean($_POST["subject_thname"]);
    $subject_course_id  = $_POST["subject_course_id"];
	$subject_detail_thai = clean($_POST["subject_detail_thai"]);
    $subject_detail_english	 = clean($_POST["subject_detail_english"]);
    $subject_status = $_POST["subject_status"];

    //เช็คข้อมูลซ้ำ
    $query = "SELECT subject_engname FROM subject WHERE subject_engname='$subject_engname'";
    $result = mysqli_query($conn, $query);
    if ($subject_engname=="" && $subject_thname=="" && $subject_id=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }else{
        if(mysqli_query($conn, $query)){
                        // if(mysqli_num_rows($result)>0){
                        //     echo "<script type=\"text/javascript\">";
                        //     echo "alert(\"มีรายวิชานี้อยู่แล้ว\");";
                        //     echo "window.history.back();";
                        //     echo "</script>";
                        //     exit();
                        // }
                        // else{
                                $sql1 = "UPDATE subject SET subject_engname='$subject_engname',
                                subject_thname='$subject_thname',
                                subject_course_id='$subject_course_id',
                                subject_detail_thai='$subject_detail_thai',
                                subject_detail_english='$subject_detail_english',
                                subject_status='$subject_status'
                                WHERE subject_id='$subject_id'";

                                if(mysqli_query($conn, $sql1)){
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขรายวิชาสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../subject.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                                }
                        }
                // } else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                // }
            }



    

mysqli_close($conn);
?>  
</body>
</html>