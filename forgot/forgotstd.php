<?php
    require("../conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    
    $student_id=$_POST['student_id'];
    $student_username=$_POST['student_username'];
    $student_password=$_POST['student_password'];
    // echo $student_id." ".$student_password." ".$student_username;
    $sql="UPDATE student 
    SET student_password='$student_password' 
    WHERE student_id='$student_id' AND student_username='$student_username' ";
    mysqli_set_charset($conn, 'utf8');     
    if(mysqli_query($conn, $sql)){
    //    echo "Records added successfully.";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"แก้ไขรหัสผ่านสำเร็จ\");";
        header("Refresh:0; url=../index.html");
        echo "</script>";
        exit();
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>