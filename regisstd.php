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
    $student_prename_id = $_POST["student_prename_id"];
    $student_fname= $_POST["student_fname"];
    $student_lname= $_POST["student_lname"];
    $student_phone= $_POST["student_phone"];
    $student_facebook= $_POST["student_facebook"];
    $student_email= $_POST["student_email"];
    $student_univercity_id = $_POST["student_univercity_id"];
    $student_faculty_id = $_POST["student_faculty_id"];
    $student_department_id = $_POST["student_department_id"];
    $student_username = $_POST["student_username"];
    $student_password = $_POST["student_password"];
	// $student_status = $_POST["student_status"];
    //เช็คข้อมูลซ้ำ
    $query = "SELECT student_id FROM student WHERE student_id='$student_id'";
    $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>0){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีนิสิตคนนี้อยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                            $sql = "INSERT INTO student(student_id, student_prename_id,student_fname,student_lname,
                                    student_phone,student_facebook,student_email,student_univercity_id,student_faculty_id,student_department_id,
                                    student_username,student_password,student_status)
                                        VALUES ('$student_id', '$student_prename_id','$student_fname','$student_lname','$student_phone','$student_facebook',
                                        '$student_email','$student_univercity_id','$student_faculty_id','$student_department_id','$student_username',
                                        '$student_password',1)";  
                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มนิสิตสำเร็จ\");";
                                header("Refresh:0; url=index.html");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                        }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
     
// echo $student_prename_id;
// echo $student_fname;


mysqli_close($conn);
?> 
</body>
</html>

   