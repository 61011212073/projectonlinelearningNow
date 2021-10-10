<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</style>
</head>
<body>
<?php 
require("conn.php");
    if (isset($_POST["data1"]) && isset($_POST["data2"]) && isset($_POST["data3"]) && isset($_POST["data4"]) && isset($_GET["exampaper"])) {
        $data1=array($_POST["data1"]);
        $data2=array($_POST["data2"]);
        $data3=array($_POST["data3"]);
        $data4=array($_POST["data4"]);
        $exampaper=$_GET["exampaper"];
        // echo count($data1[0]);
        // echo count($data2[0]);
        // echo $exampaper;
       
        // print_r($data1);
        
        // echo $json;
        
        for ($i=0; $i < count($data1[0]) ; $i++) { 
            // echo $exampaper."<br>".$data1[0][$i]."<br>".$data2[0][$i]."<br>".$data3[0][$i]."<br>".$data4[0][$i]."<br>";
            // $json1[$i]=json_encode($data1[0][$i]."-".$data2[0][$i]."-".$data3[0][$i]."-".$data4[0][$i]);
            // $json2=json_encode($data2[$i]);
            // $json3=json_encode($data3[$i]);
            // $json4=json_encode($data4[$i]);
            // $j1=$json1[$i].str_split("-");
            
            // echo $json1[$i];
            $j1=json_encode($data1[0][$i],JSON_UNESCAPED_UNICODE);
            $j2=json_encode($data2[0][$i],JSON_UNESCAPED_UNICODE);
            $j3=json_encode($data3[0][$i],JSON_UNESCAPED_UNICODE);
            $j4=json_encode($data4[0][$i],JSON_UNESCAPED_UNICODE);
            // echo substr($j1,1,-1)."<br>";
            // echo substr($j2,1,-1)."<br>";
            // echo substr($j3,1,-1)."<br>";
            // echo substr($j4,1,-1)."<br>";
            mysqli_set_charset($conn, 'utf8');

            // $utf8=encode('ascii').decode('unicode-escape').encode('utf-16', 'surrogatepass').decode('utf-16');


            $sql_exam="INSERT INTO examaddwords(examAddwords_exampapers_id,examAddwords_question,examAddwords_answer,examAddwords_fullscore,examAddwords_keyword) 
            VALUE('$exampaper','".substr($j1,1,-1)."','".substr($j2,1,-1)."','".substr($j3,1,-1)."','".substr($j4,1,-1)."')";
            
            mysqli_set_charset($conn, 'utf8');
            if(mysqli_query($conn,$sql_exam) && $i==count($data1[0])-1){
                echo "<script type=\"text/javascript\">";
                // echo "alert(\"เพิ่มข้อสอบสำเร็จ\");";
                header("Refresh:0; url=../exams.php?exam=$exampaper");
                echo "</script>";
                exit();
             } 
             else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
             }

        }
    }
    if(isset($_POST["exampapers_coursesopen_id"]) && isset($_POST["exampapers_name"]) && isset($_POST["exampapers_category"])){
        $exampapers_coursesopen_id=$_POST["exampapers_coursesopen_id"];
        $exampapers_name=$_POST["exampapers_name"];
        $exampapers_category=$_POST["exampapers_category"];

        $sql_exam="INSERT INTO exampapers(exampapers_coursesopen_id,exampapers_name,exampapers_category,exampapers_status) 
        VALUE('$exampapers_coursesopen_id','$exampapers_name','$exampapers_category',1)";
        
        mysqli_set_charset($conn, 'utf8');
        if(mysqli_query($conn,$sql_exam)){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"เพิ่มเอกสารข้อสอบสำเร็จ\");";
            header("Refresh:0; url=../exampaper.php");
            echo "</script>";
            exit();
         } 
         else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
         }
    }
    
?>
</body>
</html>