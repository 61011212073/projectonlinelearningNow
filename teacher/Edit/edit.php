<?php
    require("conn.php");
    function clean($value){
        $value = trim($value);
        return $value; 
    }
   if (isset($_POST["document_id"]) && isset($_POST["document_name"])) {
        mysqli_query($conn,"SET CHARACTER SET UTF8");  
        $document_id=$_POST["document_id"];
        $document_name=clean($_POST["document_name"]);
        $sql = "UPDATE document SET document_name='$document_name'
        WHERE document_id='$document_id'";  

        mysqli_set_charset($conn, 'utf8');     
        if(mysqli_query($conn, $sql)){
        
        //    echo "Records added successfully.";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"แก้ไขเอกสารสำเร็จ\");";
        header("Refresh:0; url=../../adddocument.php");
        echo "</script>";
        exit();
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST["vdo_id"]) && isset($_POST["vdo_name"])) {
        mysqli_query($conn,"SET CHARACTER SET UTF8");  
        $vdo_id=$_POST["vdo_id"];
        $vdo_name=clean($_POST["vdo_name"]);
        $sql = "UPDATE vdo SET vdo_name='$vdo_name'
        WHERE vdo_id='$vdo_id'";  

        mysqli_set_charset($conn, 'utf8');     
        if(mysqli_query($conn, $sql)){
            // echo "Records added successfully.";
            echo "<script type=\"text/javascript\">";
            echo "alert(\"แก้ไขวีดีทัศน์สำเร็จ\");";
            header("Refresh:0; url=../../addvdo.php");
            echo "</script>";
            exit();
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST["work_id"]) && isset($_POST["work_name"]) && isset($_POST["work_detail"]) && isset($_POST["work_enddate"])) {
        mysqli_query($conn,"SET CHARACTER SET UTF8");  

        $work_id=$_POST["work_id"];
        $work_name=clean($_POST["work_name"]);
        $work_detail=$_POST["work_detail"];
        $work_enddate=$_POST["work_enddate"];
        $sql = "UPDATE work SET work_name='$work_name',
        work_detail='$work_detail',
        work_enddate='$work_enddate'
        WHERE work_id='$work_id'";  

        mysqli_set_charset($conn, 'utf8');     
        if(mysqli_query($conn, $sql)){
            // echo "Records added successfully.";
            echo "<script type=\"text/javascript\">";
            echo "alert(\"แก้ไขงานสำเร็จ\");";
            header("Refresh:0; url=../../addexam.php");
            echo "</script>";
            exit();
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST["live_id"]) && isset($_POST["live_story"]) && isset($_POST["live_link"])) {
        mysqli_query($conn,"SET CHARACTER SET UTF8");  

        $live_id=$_POST["live_id"];
        $live_story=clean($_POST["live_story"]);
        $live_link=$_POST["live_link"];

        $sql = "UPDATE live SET live_story='$live_story',
        live_link='$live_link'
        WHERE live_id='$live_id'";  

        mysqli_set_charset($conn, 'utf8');     
        if(mysqli_query($conn, $sql)){
            // echo "Records added successfully.";
            echo "<script type=\"text/javascript\">";
            echo "alert(\"แก้ไขไลฟ์สำเร็จ\");";
            header("Refresh:0; url=../addstream.php");
            echo "</script>";
            exit();
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST["news_id"]) && isset($_POST["news_name"]) && isset($_POST["news_detail"])) {
        mysqli_query($conn,"SET CHARACTER SET UTF8");  

        $news_id=$_POST["news_id"];
        $news_name=clean($_POST["news_name"]);
        $news_detail=$_POST["news_detail"];

        $sql = "UPDATE news SET news_name='$news_name',
        news_detail='$news_detail'
        WHERE news_id='$news_id'";  

        mysqli_set_charset($conn, 'utf8');     
        if(mysqli_query($conn, $sql)){
            // echo "Records added successfully.";
            echo "<script type=\"text/javascript\">";
            echo "alert(\"แก้ไขข่าวสารสำเร็จ\");";
            header("Refresh:0; url=../news.php");
            echo "</script>";
            exit();
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

?>