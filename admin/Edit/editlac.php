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

    $teacher_id = $_POST["teacher_id_id"];
	$teacher_fname = clean($_POST["teacher_fname"]);
    $teacher_lname = clean($_POST["teacher_lname"]);
	$teacher_phone = clean($_POST["teacher_phone"]);
    $teacher_email = clean($_POST["teacher_email"]);
    $teacher_username = clean($_POST["teacher_username"]);
	$teacher_password = $_POST["teacher_password"];

    //เช็คข้อมูลซ้ำ
    // $query = "SELECT preName_name FROM prename WHERE preName_name='$prename'";
    // $result = mysqli_query($conn, $query);
    //     if(mysqli_query($conn, $query)){
                        // if(mysqli_num_rows($result)>0){
                        //     echo "<script type=\"text/javascript\">";
                        //     echo "alert(\"มีอาจารย์ท่านนี้อยู่แล้ว\");";
                        //     echo "window.history.back();";
                        //     echo "</script>";
                        //     exit();
                        // }
                        // else{
                            $sql = "UPDATE teacher SET teacher_fname='$teacher_fname',
                            teacher_lname='$teacher_lname',
                            teacher_phone='$teacher_phone',
                            teacher_email='$teacher_email',
                            teacher_username='$teacher_username',
                            teacher_password='$teacher_password' WHERE teacher_id_id='$teacher_id'";  
                            
                                mysqli_set_charset($conn, 'utf8');     
                                if(mysqli_query($conn, $sql)){
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขอาจารย์สำเร็จ\");";
                                 header("Refresh:0; url=../teacher.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                        // }
                // } 
                // else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                // }
     



mysqli_close($conn);
?> 
</body>
</html>

   