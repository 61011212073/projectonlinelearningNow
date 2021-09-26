<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>

<td class="ON-OFF">
  <?php 
        $rs="1";
      if($rs =="1"){
  ?>
      <input name="icon" id="icon" rel=""  type="checkbox" data-toggle="toggle" data-on="เปิดใช้งาน" data-off="ปิดใช้งาน" data-onstyle="success" data-offstyle="danger" checked>

  <?php      
       
       }else if($rs['status_slide'] =="0"){
  ?>
      <input name="icon<?php echo $rs['id']; ?>" id="icon<?php echo $rs['id']; ?>" rel="<?php echo $rs['id']; ?>"  type="checkbox" data-toggle="toggle" data-on="เปิดใช้งาน" data-off="ปิดใช้งาน" data-onstyle="success" data-offstyle="danger">
  <?php
       }else{
  ?>
      <button>ภาพ slide แรกเสมอ</button>
  <?php  
       }
       
       ?>
  <script>
  $(function() {
    $('#icon<?php echo $rs['id']; ?>').change(function() {
    	//alert($(this).prop('checked'));
    	var ch_val = $(this).prop('checked');
    	var rel = $(this).attr('rel');
    	//alert(ch_val);

    	if(ch_val==true){
    		var status = 1;
    		//alert(status);
    	}
    	if(ch_val==false){
    		var status = 0;
    		//alert(status);
    	}

      $.ajax({
        	url: 'update_status_slide.php',
        	type: 'POST',
        	data: {id: rel, value: status,},
        	async: false,
        	success: function (data) {
            //console.log(data);
         		}
    		});

  
     })
  })
</script>
	</td>
</body>
</html>