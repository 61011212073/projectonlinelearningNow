<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE univercity SET univercity_status='$value' WHERE univercity_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>