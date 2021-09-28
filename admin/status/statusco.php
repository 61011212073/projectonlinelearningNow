<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE course SET course_status='$value' WHERE course_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>