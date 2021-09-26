<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    session_start();
    if (isset($_POST['submit'])) {
            
        require('conn.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM student Where student_username = '$username' AND student_password = '$password' ";
        $result = mysqli_query($conn , $query);

        if(mysqli_num_rows($result) != 1)
            {
                $query1 = "SELECT * FROM teacher Where teacher_username = '$username' AND teacher_password = '$password' ";
                $result1 = mysqli_query($conn , $query1);

                if (mysqli_num_rows($result1) != 1) {
                    // echo "admin";
                        $query2 = "SELECT * FROM admin Where admin_username = '$username' AND admin_password = '$password' ";
                        $result2 = mysqli_query($conn , $query2);

                        if(mysqli_num_rows($result2) == 1)
                        {
                            $_SESSION['admin_username']=$username;                            
                            // $row = mysqli_fetch_array($result2);
                            // echo $row['admin_id']."<br>".$row['admin_fname'];
                            // $id=$row['admin_id'];

                            // echo "<script>";
                            // echo "Swal.fire({
                            //     position: 'top-end',
                            //     icon: 'success',
                            //     title: 'Your work has been saved',
                            //     showConfirmButton: false,
                            //     timer: 1500
                            //   })";
                            // echo "</script>";
                            
                            header("Location: ./admin/homeadmin.php");
                        }
                        else {
                            echo "<script>alert('User or password Not');</script>";
                            header("Refresh:0; url=index.php");
                        }
                    }
                    else{
                        // echo "teacher";
                        // $row = mysqli_fetch_array($result1);
                        // $id=$row['teacher_id'];
                        $_SESSION['teacher_username']=$username;
                        header("Location: ./teacher/hometeacher1.php");
                    }
            }
        else {
                // echo "student"; 
                // $row = mysqli_fetch_array($result);
                // $id=$row['student_id'];
                $_SESSION['student_username']=$username; 
                header("Location: ./student/aboutSubject.php"); 
        }
    
    }
    else{
        echo "<script>alert('User or password Not');</script>";
        header("Refresh:0; url=index.php");
    }

?>


</body>
</html>
