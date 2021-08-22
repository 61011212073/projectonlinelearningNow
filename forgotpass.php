<?php
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Online Education</title>
      <link rel="stylesheet" href="assets/css/forgotpass.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               ลืมรหัสผ่าน
            </div>
            <div class="title signup">
                ลืมรหัสผ่าน
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">นิสิต</label>
               <label for="signup" class="slide signup">อาจารย์</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="forgot/forgotstd.php" class="login" method="post">
                  <div class="field">
                     <input type="text" placeholder="รหัสนิสิต" required name="student_id">
                  </div>
                  <div class="field">
                     <input type="text" placeholder="ชื่อผู้ใช้งาน" required name="student_username">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="รหัสผ่านใหม่" required name="student_password">
                  </div>
                  <!-- <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div> -->
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="ยืนยัน">
                  </div>
                  <!-- <div class="signup-link">
                    ไม่ใช่สมาชิก? <a href="index.html">สมัครสมาชิก ตอนนี้</a>
                  </div> -->
               </form>
               <form action="#" class="signup">
                  <div class="field">
                     <input type="text" placeholder="เลขบัตรประชาชน" required name="">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="ชื่อผู้ใช้งาน" required name="">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="รหัสผ่านใหม่" required name="">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="ยืนยัน">
                  </div>
                  <!-- <div class="signup-link">
                    ไม่ใช่สมาชิก? <a href="registerled.php">สมัครสมาชิก ตอนนี้</a>
                  </div> -->
               </form>
               
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>