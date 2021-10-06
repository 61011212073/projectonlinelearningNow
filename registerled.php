<?php
  require("conn.php");
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $sql1="SELECT * FROM univercity WHERE univercity_status=1";
  $result1 = mysqli_query($conn,$sql1);
  // $sql2="SELECT * FROM faculty";
  // $result2 = mysqli_query($conn,$sql2);
  // $sql3="SELECT * FROM department";
  // $result3 = mysqli_query($conn,$sql3);
  $sql4="SELECT * FROM prename WHERE preName_status=1";
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 <script type="text/javascript">
		$(document).ready(function(){
			$("#univercity").change(function(){
				var id_uivarcity = $(this).val();
				$.ajax({
					url: 'teacher/data.php',
					method: 'post',
					data: {id:id_uivarcity,function:'uivarcity'},
          success: function(data){
            console.log(data);
            $('#faculty').html(data);
          }
				})
				})
        $("#faculty").change(function(){
				var id_faculty = $(this).val();
				$.ajax({
					url: 'teacher/data.php',
					method: 'post',
					data: {id:id_faculty,function:'faculty'},
          success: function(data){
            console.log(data);
            $('#department').html(data);
          }
				})
				})
			})
	</script>
</head>
<body>
  <div class="container">
    <div class="title">สมัครสมาชิก อาจารย์</div>
    <div class="content">
      <form action="./registes_forgot/regislac.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
         <div class="input-box">
            <span class="details">รหัสบัตรประชาชน</span>
            <input type="text" placeholder="รหัสบัตรประชาชน" required name="teacher_id_id">
          </div>
          <div class="input-box">
            <span class="details">คำนำหน้าชื่อ</span>
            <select name="teacher_prename_id">
               <option selected disabled>-เลือกคำนำหน้าชื่อ-</option>
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
          <!-- <div class="input-box">
            <span class="details">ลิงค์เฟสบุ๊ค</span>
            <input type="url" placeholder="ลิงค์เฟสบุ๊ค" required name="teacher_email">
          </div> -->
          <div class="input-box">
            <span class="details">อีเมล์</span>
            <input type="email" placeholder="อีเมล์" required name="teacher_email">
          </div>
          <div class="input-box">
            <span class="details">มหาวิทยาลัย</span>
            <select class="form-select form-control" aria-label="Default select example" name="teacher_univercity_id" id="univercity">
                  <option selected disabled>-เลือกมหาวิทยาลัย-</option>
                 <!-- <option>เลือกภาควิชา</option> -->
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
            <select name="teacher_faculty_id" id="faculty">

            </select>
          </div>
          <div class="input-box">
            <span class="details">ภาควิชา</span>
            <select name="teacher_department_id" id="department">
               
            </select>
          </div>
          <div class="input-box">
            <span class="details">ชื่อผู้ใช้งาน(username)</span>
            <input type="text" placeholder="ชื่อผู้ใช้งาน" required name="teacher_username">
          </div>
          <div class="input-box">
            <span class="details">รหัสผ่าน(password)</span>
            <input type="password" placeholder="รหัสผ่าน" required name="teacher_password">
          </div> 
          <!-- <div class="form-group">
                    <label for="usr" style="font-family: 'Kanit', sans-serif;">เลือกรูปภาพ :</label>
                    <input type="file" required class="form-control" name="student_profile" style="font-family: 'Kanit', sans-serif;">
                </div> -->
        </div>

        <div class="button">
          <input type="submit" value="สมัครสมาชิก">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
