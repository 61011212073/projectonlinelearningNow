<?php 
    require ('../conn.php');

    $sendwork_student_id=$_POST["sendwork_student_id"];
    $sendwork_workorder=$_POST["sendwork_workorder"];
    // $sendwork_sendwork=$_POST["sendwork_sendwork"];

    // echo $sendwork_workorder;

    $sql="SELECT sendwork_id FROM sendwork 
    WHERE sendwork_student_id='$sendwork_student_id' AND sendwork_workorder='$sendwork_workorder'";
    $query=mysqli_query($conn,$sql);

    if (mysqli_fetch_row($query)>0) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"คุณส่งงานแล้ว\");";
        echo "window.history.back();";
        echo "</script>";
        exit();
    }else{
            // echo "<pre>";
            // echo print_r($_FILES['sendwork_sendwork']);
            // echo "</pre>";
            // if (isset($_FILES['sendwork_sendwork'])) {
        
                $img_name = $_FILES['sendwork_sendwork']['name'];
                $img_size = $_FILES['sendwork_sendwork']['size'];
                $tmp_name = $_FILES['sendwork_sendwork']['tmp_name'];
                $error = $_FILES['sendwork_sendwork']['error'];
                
                if ($error == 0) {
                    if ($img_size > 12500000) {
                        $em = "Sorry, your file is too large.";
                        header("Location: ../student/lecture.php?error=$em");
                    }
                    else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
            
                        $allowed_exs = array("pdf","doc", "docx", "png", "pptx"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("SENDEDU", true).'.'.$img_ex_lc; 
                            $img_upload_path = '../../uploadsend/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);

                            $sql_send="INSERT INTO sendwork(sendwork_student_id,sendwork_workorder,sendwork_sendwork) 
                            VALUE('$sendwork_student_id','$sendwork_workorder','$new_img_name')";
                            if(mysqli_query($conn, $sql_send)){
                                echo "<script type=\"text/javascript\">";
                                echo "alert(\"ส่งงานสำเร็จ\");";
                                header("Refresh:0; url=../../student/lecture.php");
                                echo "</script>";
                                exit();
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
        
                        }else {
                            $em = "You can't upload files of this type";
                            header("Location: adddocument.php?error=$em");
                        }
                    }
        
        
        
                }
            }


    
    

?>