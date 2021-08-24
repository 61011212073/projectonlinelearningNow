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
    $univercity = clean($_POST["univercity"]);
    $univercity_thcode = clean($_POST["univercity_thcode"]);
    $univercity_engcode = clean($_POST["univercity_engcode"]);
	// $status_univercity = $_POST["status_univercity"];
    //เช็คข้อมูลซ้ำ
    $query = "SELECT univercity_name,univercity_thcode,univercity_engcode FROM univercity WHERE univercity_name='$univercity'";
    $result = mysqli_query($conn, $query);
    if ($univercity=="" && $univercity_thcode=="" && $univercity_thcode=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }else{
    if(mysqli_query($conn, $query)){
            if(mysqli_num_rows($result) > 0){
                echo "<script type=\"text/javascript\">";
                echo "alert(\"มีมหาวิทยาลัยนี้อยู่แล้ว\");";
                echo "window.history.back();";
                echo "</script>";
                exit();
            }
            else{
                    $sql1 = "INSERT INTO univercity(univercity_name,univercity_thcode,univercity_engcode,univercity_status )
                            VALUES ('$univercity','$univercity_thcode','$univercity_engcode',1)";
                    if(mysqli_query($conn, $sql1)){
                    //    echo "Records added successfully.";
                    echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มมหาวิทยาลัยสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../univercity.php");
                                echo "</script>";
                                exit();
                    } else{
                        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                    }

            }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    }




    
mysqli_close($conn);
?>  
</body>
</html>