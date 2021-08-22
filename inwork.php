<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</style>
</head>
<body>
<?php 
    require("conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8"); 
    $work_courseopen_id  = $_POST["work_courseopen_id"];
	$work_name = $_POST["work_name"];
    $work_detail = $_POST["work_detail"];
    $work_enddate = $_POST["work_enddate"];
    $work_status = $_POST["work_status"];

    if (isset($_POST['submit']) && isset($_FILES['work_file'])) {

        // echo "<pre>";
        // print_r($_FILES['document_file']);
        // echo "</pre>";

        $img_name = $_FILES['work_file']['name'];
        $img_size = $_FILES['work_file']['size'];
        $tmp_name = $_FILES['work_file']['tmp_name'];
        $error = $_FILES['work_file']['error'];
        
        if ($error == 0) {
            if ($img_size > 12500000) {
                $em = "Sorry, your file is too large.";
                header("Location: addexam.php?error=$em");
            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("pdf","doc", "docx", "png", "pptx"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("WorkEDU", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploadwork/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // echo $document_coursesopen_id.$document_name.$new_img_name.$document_status;

                    // // Insert into Database
                    // $sql = "INSERT INTO document(document_coursesopen_id,document_name,document_file,document_status) 
                    //         VALUES('$document_coursesopen_id','$document_name','$new_img_name','$document_status')";
                    // mysqli_query($conn, $sql);
                    // mysqli_set_charset($conn, 'utf8');
                    // if(mysqli_query($conn, $sql)){
                    //     //    echo "Records added successfully.";
                    //     echo "<script type=\"text/javascript\">";
                    //                     echo "alert(\"เพิ่มเอกสารประกอบการสอนสำเร็จ\");";
                    //                     // echo "window.history.back();";
                    //                     header("Refresh:0; url=book.php");
                    //                     echo "</script>";
                    //                     exit();
                    //     } else{
                    //         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    //     }
                    $sql = "INSERT INTO work(work_courseopen_id,work_name,work_detail,work_file,work_enddate,work_status) 
                    VALUES('$work_courseopen_id','$work_name','$work_detail','$new_img_name','$work_enddate','$work_status')";
                     mysqli_set_charset($conn, 'utf8');
                    if(mysqli_query($conn, $sql)){
                     //    echo "Records added successfully.";
                     echo "<script type=\"text/javascript\">";
                                     echo "alert(\"เพิ่มแบบฝึกหัดสำเร็จ\");";
                                     // echo "window.history.back();";
                                     header("Refresh:0; url=addexam.php");
                                     echo "</script>";
                                     exit();
                     } else{
                         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                     }

                }else {
                    $em = "You can't upload files of this type";
                    header("Location: addexam.php?error=$em");
                }
            }



        }
    }
    else {
        // $em = "You can't upload files of this type";
        header("Location: book.php");
    }

?>
</body>
</html>