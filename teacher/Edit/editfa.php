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
    $faculty_id=$_POST['faculty_id'];
    $faculty_uivarcity_id  = $_POST["faculty_uivarcity_id"];
    $faculty_name = clean($_POST["faculty_name"]);
	// $faculty_status = $_POST["faculty_status"];

    //เช็คข้อมูลซ้ำ
    $query = "SELECT faculty_name FROM faculty WHERE faculty_uivarcity_id='$faculty_uivarcity_id' AND faculty_name='$faculty_name'";
    $result = mysqli_query($conn, $query);
    if ($faculty_name=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
    }else{
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>0){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีคณะนี้อยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                                $sql1 = "UPDATE faculty SET faculty_name='$faculty_name' WHERE faculty_id='$faculty_id'";
                                
                                if(mysqli_query($conn, $sql1)){
                                //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มคณะสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../faculty.php");
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