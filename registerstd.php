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
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div class="title">สมัครสมาชิก นิสิต</div>
    <div class="content">
      <form action="regisstd.php" method="post">
        <div class="user-details">
         <div class="input-box">
            <span class="details">รหัสนิสิต</span>
            <input type="text" placeholder="รหัสนิสิต" required name="student_id">
          </div>
          <div class="input-box">
            <span class="details">คำนำหน้าชื่อ</span>
            <!-- <input type="text" placeholder="คำนำหน้าชื่อ" required> -->
            <select name="student_prename_id">
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
            <input type="text" placeholder="ชื่อ" required name="student_fname">
          </div>
          <div class="input-box">
            <span class="details">นามสกุล</span>
            <input type="text" placeholder="นามสกุล" required name="student_lname">
          </div>
          <div class="input-box">
            <span class="details">เบอร์โทรศัพท์</span>
            <input type="text" placeholder="เบอร์โทรศัพท์" required name="student_phone">
          </div>
          <div class="input-box">
            <span class="details">ลิงค์เฟสบุ๊ค</span>
            <input type="url" placeholder="ลิงค์เฟสบุ๊ค" required name="student_facebook">
          </div>
          <div class="input-box">
            <span class="details">อีเมล์</span>
            <input type="email" placeholder="อีเมล์" required name="student_email">
          </div>
          <div class="input-box">
            <span class="details">มหาวิทยาลัย</span>
            <!-- <input type="text" placeholder="อีเมล์" required> -->
            <select name="student_univercity_id">
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
            <select name="student_faculty_id">
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
            <select name="student_department_id">
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
            <input type="text" placeholder="ชื่อผู้ใช้งาน" required name="student_username">
          </div>
          <div class="input-box">
            <span class="details">รหัสผ่าน</span>
            <input type="password" placeholder="รหัสผ่าน" required name="student_password">
          </div>
          <div class="input-box">
            <span class="details">เลือกรูปภาพ</span>
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
        <!-- <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div> -->
            <div class="button" width="50px">
              <input type="submit" value="สมัครสมาชิก"  >
             </div>
      </form>
    </div>
  </div>

</body>
</html>
