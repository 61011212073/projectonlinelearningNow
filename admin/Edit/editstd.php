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
    $student_fname= $_POST["student_fname"];
    $student_lname= $_POST["student_lname"];
    $student_phone= $_POST["student_phone"];
    $student_facebook= $_POST["student_facebook"];
    $student_email= $_POST["student_email"];
    $student_username = $_POST["student_username"];
    $student_password = $_POST["student_password"];

    // echo $student_id;

    //เช็คข้อมูลซ้ำ
    // $query = "SELECT student_id FROM student WHERE student_id='$student_id'";
    // $result = mysqli_query($conn, $query);
    //     if(mysqli_query($conn, $query)){
    //                     if(mysqli_num_rows($result)>0){
    //                         echo "<script type=\"text/javascript\">";
    //                         echo "alert(\"มีนิสิตคนนี้อยู่แล้ว\");";
    //                         echo "window.history.back();";
    //                         echo "</script>";
    //                         exit();
    //                     }
                        // else{
                            $sql = "UPDATE student SET student_fname='$student_fname', 
                            student_lname='$student_lname', 
                            student_phone='$student_phone', 
                            student_email='$student_email',
                            student_facebook='$student_facebook', 
                            student_username='$student_username', 
                            student_password='$student_password' WHERE student_id='$student_id'";  

                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขนิสิตสำเร็จ\");";
                                header("Refresh:0; url=../student.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                //         }
                // } else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                // }
     
// echo $prename;
// echo $status_prename;


mysqli_close($conn);
?> 
</body>
</html>

   