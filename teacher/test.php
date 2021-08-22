<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center">
<form class="row g-3 needs-validation" novalidate action="./Add/insertopsj.php" method="post">
                        <input type="text" name="coursesopen_subject_id" id="">
                        <input type="text" name="coursesopen_term" id="">
                        <input type="text" name="coursesopen_schoolyear" id="">
                        <input type="text" name="coursesopen_teacher_id" id="">
                        <input type="text" name="coursesopen_status" id="">
                      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                      </form>












    <!-- <input type="text" class="only">
    <script type="text/javascript">
        function input(inputclass,filter){
            for (var i = 0; i < inputclass.length; i++) {
                ["input"].forEach(function(event){
                    inputclass[i].addEventListener(event, function(){
                        // console.log(this.value);
                        if (!filter(this.value)) {
                            this.value="";
                        }
                    });
                });

            }
        }
        input(document.getElementsByClassName("only"),function (value) {
            // return /^[0-9]*$/.test(value); สำหรับตัวเลข
            // return /^[a-zA-Z\s]+$/.test(value); สำหรับภาษาอังกฤษ
            // return /^[ก-๏\s]+$/.test(value); สำหรับภาษาไทย
        });
    </script> -->
</body>
</html>