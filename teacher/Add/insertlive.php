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
    $live_coursesopen_id = clean($_POST["live_coursesopen_id"]);
    $live_story  = $_POST["live_story"];
    $live_link = $_POST["live_link"];
	// $department_status = $_POST["department_status"];

    //เช็คข้อมูลซ้ำ
    // $query = "SELECT department_name FROM department WHERE department_name='$department_name'";
    // $result = mysqli_query($conn, $query);

    if($live_link=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
        exit();
     
    } else {
        // if(mysqli_query($conn, $query)){
        //                 if(mysqli_num_rows($result)>0){
        //                     echo "<script type=\"text/javascript\">";
        //                     echo "alert(\"มีภาควิชาอยู่แล้ว\");";
        //                     echo "window.history.back();";
        //                     echo "</script>";
        //                     exit();
        //                 }
        //                 else{
                            $sql1 = "INSERT INTO live(live_coursesopen_id,live_story,live_link)
                                    VALUES ('$live_coursesopen_id','$live_story','$live_link')";
                            if(mysqli_query($conn, $sql1)){
                            //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มไลฟ์สำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../addstream.php");
                                echo "</script>";
                                exit();
                            } else{
                                echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                            }
                        }
                // } else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                // }
     
    // }
mysqli_close($conn);
?> 
     </body>
</html>