<?php
require("conn.php");
    if (isset($_POST)) {
        // print_r($_POST["examans_std_std"]);
        // print_r($_POST["examans_std_examaddwords"]);
        // print_r($_POST["examans_std_answer"]);

        $examans_std_std=$_POST["examans_std_std"];
        $examans_std_examaddwords=array($_POST["examans_std_examaddwords"]);
        $examans_std_answer=array($_POST["examans_std_answer"]);

        for ($i=0; $i < COUNT($examans_std_examaddwords[0]); $i++) { 
            $j1=json_encode($examans_std_examaddwords[0][$i],JSON_UNESCAPED_UNICODE);
            $j2=json_encode($examans_std_answer[0][$i],JSON_UNESCAPED_UNICODE);

            // echo substr($j1,1,-1)."<br>";
            // echo substr($j2,1,-1)."<br>";

            $st1=substr($j1,1,-1);
            $st2=substr($j2,1,-1);

            // echo $st1." ".$st2." ".$examans_std_std."<br>";
            $sql_exam="INSERT INTO examans_std(examans_std_examaddwords,examans_std_answer,examans_std_std) 
            VALUE('$st1','$st2','$examans_std_std')";
            
            mysqli_set_charset($conn, 'utf8');
            mysqli_query($conn,$sql_exam);
            if($i===count($examans_std_examaddwords[0])-1){
                echo "<script type=\"text/javascript\">";
                // echo "alert(\"เพิ่มข้อสอบสำเร็จ\");";
                header("Refresh:0; url=aboutSubject.php");
                echo "</script>";
                exit();
             } 
             else{
                // echo "ERROR: Could not able to execute." . 
                mysqli_error($conn);
             }
        }
    }
?>