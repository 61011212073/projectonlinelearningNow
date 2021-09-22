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

    //เช็คข้อมูลซ้ำ

    echo "<pre>";
            print_r($_FILES['student_profile']);
            echo "</pre>";

    $query = "SELECT student_id FROM student WHERE student_id='$student_id'";
    $result = mysqli_query($conn, $query);

        if (isset($_POST['submit']) && isset($_FILES['student_profile'])) {

            
    
            $img_name = $_FILES['student_profile']['name'];
            $img_size = $_FILES['student_profile']['size'];
            $tmp_name = $_FILES['student_profile']['tmp_name'];
            $error = $_FILES['student_profile']['error'];
            
            if ($error == 0) {
                if ($img_size > 12500000) {
                    $em = "Sorry, your file is too large.";
                    header("Location: addexam.php?error=$em");
                }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpeg", "png", "jpg"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("Profile", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploadphoto/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
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
                            student_username,student_password,student_status,student_profile)
                                VALUES ('$student_id', '$student_prename_id','$student_fname','$student_lname','$student_phone','$student_facebook',
                                '$student_email','$student_univercity_id','$student_faculty_id','$student_department_id','$student_username',
                                '$student_password',1,'$new_img_name')";
                            mysqli_set_charset($conn, 'utf8');
                            if(mysqli_query($conn, $sql)){
                            echo "<script type=\"text/javascript\">";
                                            echo "alert(\"สมัครสำเร็จ\");";
                                            header("Refresh:0; url=../index.html");
                                            echo "</script>";
                                            exit();
                     } else{
                         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                     }
                    }
                }
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: adddocument.php?error=$em");
                }
            }



        }
    }


mysqli_close($conn);
?> 
</body>
</html>

   