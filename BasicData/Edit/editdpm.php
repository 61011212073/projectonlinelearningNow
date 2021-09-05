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
    $department_id=$_POST['department_id'];
    $department_name = clean($_POST["department_name"]);
    $department_univarcity_id  = $_POST["department_univarcity_id"];
    $department_faculty_id = $_POST["department_faculty_id"];
	$department_status = $_POST["department_status"];

    //เช็คข้อมูลซ้ำ
    $query = "SELECT department_name FROM department WHERE department_name='$department_name'";
    $result = mysqli_query($conn, $query);

    if($department_name=="") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"กรุณากรอกข้อมูล\");";
        echo "window.history.back();";
        echo "</script>";
        exit();
     
    } else {
        if(mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result)>0){
                            echo "<script type=\"text/javascript\">";
                            echo "alert(\"มีภาควิชาอยู่แล้ว\");";
                            echo "window.history.back();";
                            echo "</script>";
                            exit();
                        }
                        else{
                            $sql1 = "UPDATE department SET department_name=$department_name,
                            department_univarcity_id='$department_univarcity_id',
                            department_faculty_id='$department_faculty_id',
                            department_status='$department_status'
                            WHERE department_id='$department_id'";
                            
                            if(mysqli_query($conn, $sql1)){
                            //    echo "Records added successfully.";
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มภาควิชาสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../department.php");
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