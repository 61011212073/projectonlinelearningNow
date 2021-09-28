<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE prename SET preName_status='$value' WHERE preName_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>