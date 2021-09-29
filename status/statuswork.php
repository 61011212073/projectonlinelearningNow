<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE work SET work_status='$value' WHERE work_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>