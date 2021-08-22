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
    $vdo_coursesopen_id = $_POST["vdo_coursesopen_id"];
	$vdo_name = $_POST["vdo_name"];
    $vdo_status = $_POST["vdo_status"];
    // $vid=$_FILES['vdo_link'];
    // echo $vdo_coursesopen_id.$vdo_name.$vdo_status;
    // echo $vid;
    if (isset($_POST['submit']) && isset($_FILES['vdo_link'])) {
        $video_name = $_FILES['vdo_link']['name'];
        $tmp_name = $_FILES['vdo_link']['tmp_name'];
        $error = $_FILES['vdo_link']['error'];
        // echo $video_name;
        if ($error === 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
    
            $video_ex_lc = strtolower($video_ex);
    
            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');
    
            if (in_array($video_ex_lc, $allowed_exs)) {
                
                $new_video_name = uniqid("Education-", true). '.'.$video_ex_lc;
                $video_upload_path = 'uploadvdo/'.$new_video_name;
                move_uploaded_file($tmp_name, $video_upload_path);
    
                // Now let's Insert the video path into database
                $sql = "INSERT INTO vdo(vdo_coursesopen_id,vdo_name,vdo_link,vdo_status) 
                       VALUES('$vdo_coursesopen_id','$vdo_name','$new_video_name','$vdo_status')";
                mysqli_set_charset($conn, 'utf8');
                    if(mysqli_query($conn, $sql)){
                        //    echo "Records added successfully.";
                        echo "<script type=\"text/javascript\">";
                                        echo "alert(\"เพิ่มวีดีโอสำเร็จ\");";
                                        // echo "window.history.back();";
                                        header("Refresh:0; url=addvdo.php");
                                        echo "</script>";
                                        exit();
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    
                // header("Location: vdo.php");
            }else {
                $em = "You can't upload files of this type";
                header("Location: addvdo.php?error=$em");
            }
        }
    }

?>
</body>
</html>