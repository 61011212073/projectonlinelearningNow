<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE faculty SET faculty_status='$value' WHERE faculty_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>