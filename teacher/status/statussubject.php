<?php
    require ('../conn.php');

    
    if(isset($_POST['id']) && isset($_POST['value'])) {
        $value=$_POST['value'];
        $id=$_POST['id'];
        $sql="UPDATE subject SET subject_status='$value' WHERE subject_id = " . $id;
        $result=mysqli_query($conn,$sql);

    }

?>