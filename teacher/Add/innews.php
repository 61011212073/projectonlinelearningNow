<?php
    require("conn.php");
    if (isset($_POST["news_name"]) && isset($_POST["news_detail"]) && isset($_POST["teacher_username"])) {
        $username=$_POST["teacher_username"];
        $teacher=mysqli_fetch_assoc(mysqli_query($conn,"SELECT teacher_id FROM teacher WHERE teacher_username='$username'"));
        $teacher1=$teacher["teacher_id"];
        $news_name=$_POST["news_name"];
        $news_detail=$_POST["news_detail"];

        $sql_news="INSERT INTO news(news_name,news_detail,news_teacher) VALUE('$news_name','$news_detail','$teacher1')";
        mysqli_set_charset($conn, 'utf8');
                if(mysqli_query($conn, $sql_news)){
                //    echo "Records added successfully.";
                echo "<script type=\"text/javascript\">";
                                echo "alert(\"เพิ่มข่าวสารสำเร็จ\");";
                                echo "window.history.back();";
                                header("Refresh:0; url=../news.php");
                                echo "</script>";
                                exit();
                } else{
                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
                }
    }


?>