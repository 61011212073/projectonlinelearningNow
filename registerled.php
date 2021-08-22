<?php
  require("conn.php");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $sql1="SELECT * FROM univercity";
  $result1 = mysqli_query($conn,$sql1);
  $sql2="SELECT * FROM faculty";
  $result2 = mysqli_query($conn,$sql2);
  $sql3="SELECT * FROM department";
  $result3 = mysqli_query($conn,$sql3);
  $sql4="SELECT * FROM prename";
  $result4 = mysqli_query($conn,$sql4);
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html>
  <head>
   <meta charset="utf-8">
   <title>Online Education</title>
   <link rel="shortcut icon" type="image/x-icon" href="assets1/images/logo3.png">
   
   <link rel="stylesheet" href="assets/css/register.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
   </head>
<body>
  <div class="container">
    <div class="title">สมัครสมาชิก อาจารย์</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
         <div class="input-box">
            <span class="details">รหัสบัตรประชาชน</span>
            <input type="text" placeholder="รหัสบัตรประชาชน" required name="">
          </div>
          <div class="input-box">
            <span class="details">คำนำหน้าชื่อ</span>
            <!-- <input type="text" placeholder="คำนำหน้าชื่อ" required> -->
            <select name="teacher_prename_id">
               <option>เลือกคำนำหน้าชื่อ</option>
               <?php
                    while($rows=mysqli_fetch_row($result4)){
                        $uni_id=$rows[0];
                        $uni_name=$rows[1];
                        echo "<option value='$uni_id'>$uni_name</option>";
                    }
                ?> 
            </select>
          </div>
          <div class="input-box">
            <span class="details">ชื่อ</span>
            <input type="text" placeholder="ชื่อ" required name="teacher_fname">
          </div>
          <div class="input-box">
            <span class="details">นามสกุล</span>
            <input type="text" placeholder="นามสกุล" required name="teacher_lname">
          </div>
          <div class="input-box">
            <span class="details">เบอร์โทรศัพท์</span>
            <input type="text" placeholder="เบอร์โทรศัพท์" required name="teacher_phone">
          </div>
          <div class="input-box">
            <span class="details">อีเมล์</span>
            <input type="email" placeholder="อีเมล์" required name="teacher_email">
          </div>
          <div class="input-box">
            <span class="details">มหาวิทยาลัย</span>
            <!-- <input type="text" placeholder="อีเมล์" required> -->
            <select name="teacher_univercity_id">
               <option>เลือกมหาวิทยาลัย</option>
               <?php
                    while($rows=mysqli_fetch_row($result1)){
                        $uni_id=$rows[0];
                        $uni_name=$rows[1];
                        echo "<option value='$uni_id'>$uni_name</option>";
                    }
                ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">คณะ</span>
            <!-- <input type="text" placeholder="คณะ" required> -->
            <select name="teacher_faculty_id">
               <option>เลือกคณะ</option>
               <?php
                    while($rows=mysqli_fetch_row($result2)){
                        $uni_id=$rows[0];
                        $uni_name=$rows[2];
                        echo "<option value='$uni_id'>$uni_name</option>";
                    }
                ?> 
            </select>
          </div>
          <div class="input-box">
            <span class="details">ภาควิชา</span>
            <!-- <input type="text" placeholder="ภาควิชา" required> -->
            <select name="teacher_department_id">
               <option>เลือกภาควิชา</option>
               <?php
                    while($rows=mysqli_fetch_row($result3)){
                        $uni_id=$rows[0];
                        $uni_name=$rows[1];
                        echo "<option value='$uni_id'>$uni_name</option>";
                    }
                ?> 
            </select>
          </div>
          <div class="input-box">
            <span class="details">ชื่อผู้ใช้งาน</span>
            <input type="text" placeholder="ชื่อผู้ใช้งาน" required name="teacher_username">
          </div>
          <div class="input-box">
            <span class="details">รหัสผ่าน</span>
            <input type="password" placeholder="รหัสผ่าน" required name="teacher_password">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="สมัครสมาชิก">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
