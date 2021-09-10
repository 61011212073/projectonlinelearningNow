<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</style>
</head>
<body>
<?php
    require('conn.php');
    mysqli_query($conn,"SET CHARACTER SET UTF8");
 function clean($value){
        $value = trim($value);
        return $value; 
    }
    $univercity_id=$_POST['univercity_id'];
    // $univercity = clean($_POST["univercity"]);
    // $univercity_thcode = clean($_POST["univercity_thcode"]);
    // $univercity_engcode = clean($_POST["univercity_engcode"]);
	$status_univercity = $_POST["univercity_status"];

                    $sql1 = "UPDATE univercity SET 
                    univercity_status='$status_univercity'
                    WHERE univercity_id='$univercity_id'";
                    if(mysqli_query($conn, $sql1)){
                    //    echo "Records added successfully.";
                    echo "<script type=\"text/javascript\">";
                                echo "alert(\"แก้ไขมหาวิทยาลัยสำเร็จ\");";
                                // echo "window.history.back();";
                                header("Refresh:0; url=../../univercity.php");
                                echo "</script>";
                                exit();
                    } else{
                        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                    }





    
mysqli_close($conn);
?>  
</body>
</html>