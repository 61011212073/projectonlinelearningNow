<?php 

    require("conn.php");
    // if (isset($_POST["function"]) && $_POST["function"] == 'subject') {
	// 	require('conn.php');
	// 	$id=$_POST["id"];
	// 	$i=0;
	// 	$sql1="SELECT document.document_id,subject.subject_engname,document.document_name,document.document_file,document.document_datetime,document_status 
	// 	FROM document 
	// 	INNER JOIN coursesopen ON document.document_coursesopen_id=coursesopen.coursesopen_id 
	// 	INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
	// 	WHERE document_coursesopen_id = '.$id.' ORDER BY document_id DESC";
	// 	$result1 = mysqli_query($conn,$sql1);
	// 	 foreach($result1 as $row){ 
	// 			if ($row["document_status"]==1) {
	// 				$status= '<div class="form-check form-switch">
	// 							<input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'" checked>
	// 						</div>';
	// 			}
	// 			else if ($row["document_status"]==0) {
	// 				$status='<div class="form-check form-switch">
	// 							<input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'">
	// 						</div>';
	// 			}

	// 		$i=$i+1;
	// 		echo '<tr>
	// 			<td> '.$i.'</td>
	// 			<td data-label="รายวิชา">'.$row["subject_engname"].'</td>
	// 			<td data-label="ชื่อวิชา">'.$row['document_name'].'</td>
	// 			<td data-label="ไฟล์เอกสารประกอบการสอน"><a href="uploadbook/'.$row["document_file"].'">ดาวน์โหลด</a></td>
	// 			<td data-label="สถานะการใช้งาน">'.$status.'</td>
	// 			<td><button type="button" name="edit"  id="'.$row["document_id"].'" class="btn btn-info btn-xs edit_data"><i class="fas fa-edit"></i></button> </td>  
	// 			<td>
	// 				<button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="'.$row["document_id"].'" class="btn btn-info btn-xs view_data"><i class="far fa-eye"></i></button>
	// 			</td>  
	// 		</tr>';
	// 		}
	// 		exit();
	// }
    
    if(isset($_POST['function']) && $_POST['function']=='subject'){
        $id=$_POST['id'];
        // echo $id.':';
        $sql="SELECT document.document_id,subject.subject_engname,document.document_name,document.document_file,document.document_datetime,document_status 
	 	FROM document 
	 	INNER JOIN coursesopen ON document.document_coursesopen_id=coursesopen.coursesopen_id 
	 	INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
	 	WHERE document_coursesopen_id = '.$id.'";
	 	$result = mysqli_query($conn,$sql);
        $i=0;
        while($row = mysqli_fetch_array($result)){
            // echo $row['document_id'].',';
            if ($row["document_status"]==1) {
                				$status= '<div class="form-check form-switch">
                							<input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'" checked>
                						</div>';
                			}
                			else if ($row["document_status"]==0) {
                				$status='<div class="form-check form-switch">
                							<input class="form-check-input" type="checkbox" id="icon'.$row["document_id"].'">
                						</div>';
                			}
            
                		$i=$i+1;
                		echo '<tr>
                			<td> '.$i.'</td>
                			<td data-label="รายวิชา">'.$row["subject_engname"].'</td>
                			<td data-label="ชื่อวิชา">'.$row['document_name'].'</td>
                			<td data-label="ไฟล์เอกสารประกอบการสอน"><a href="uploadbook/'.$row["document_file"].'">ดาวน์โหลด</a></td>
                			<td data-label="สถานะการใช้งาน">'.$status.'</td>
                			<td><button type="button" name="edit"  id="'.$row["document_id"].'" class="btn btn-info btn-xs edit_data"><i class="fas fa-edit"></i></button> </td>  
                			<td>
                				<button type="button" name="view" value="view" data-bs-target="#staticBackdrop" id="'.$row["document_id"].'" class="btn btn-info btn-xs view_data"><i class="far fa-eye"></i></button>
                			</td>  
                		</tr>';
                		
                        ?>
                        
                        <?php
                		} exit();
           
    }

?>