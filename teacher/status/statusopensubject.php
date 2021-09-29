<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE coursesopen SET coursesopen_status='$value' WHERE coursesopen_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>