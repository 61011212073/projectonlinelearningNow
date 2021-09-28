<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE document SET document_status='$value' WHERE document_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>