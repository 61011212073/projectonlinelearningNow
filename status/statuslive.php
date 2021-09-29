<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE live SET live_status='$value' WHERE live_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>