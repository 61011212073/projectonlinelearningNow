<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE vdo SET vdo_status='$value' WHERE vdo_id =" . $id;
        $result=mysqli_query($conn,$sql);

    }

?>