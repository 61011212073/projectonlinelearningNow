<?php
    require("../conn.php");
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    
    $teacher_id_id=$_POST['teacher_id_id'];
    $teacher_username=$_POST['teacher_username'];
    $teacher_password=$_POST['teacher_password'];
    // echo $student_id." ".$student_password." ".$student_username;
    $sql="UPDATE teacher 
    SET teacher_password='$teacher_password' 
    WHERE teacher_id_id='$teacher_id_id' AND teacher_username='$teacher_username' ";
    mysqli_set_charset($conn, 'utf8');     
    if(mysqli_query($conn, $sql)){
    //    echo "Records added successfully.";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"แก้ไขรหัสผ่านสำเร็จ\");";
        header("Refresh:0; url=../index.php");
        echo "</script>";
        exit();
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>