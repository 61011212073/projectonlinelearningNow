<?php 
	require 'DbConnect.php';
	
	if(isset($_POST["function"]) && $_POST["function"] == 'uivarcity') {
		require ('conn.php');

		$id=$_POST['id'];
		$sql="SELECT * FROM faculty WHERE faculty_uivarcity_id ='$id' AND faculty_status=1";
		$uni=mysqli_query($conn,$sql);
		echo '<option selected disabled>-เลือกคณะ-</option>';
		foreach($uni as $value){
			echo '<option value="'.$value['faculty_id'].'">'.$value['faculty_name'].'</option>';
		}
		exit();
	}

	if(isset($_POST["function"]) && $_POST["function"] == 'faculty') {
		require ('conn.php');

		$id=$_POST['id'];
		$sql="SELECT * FROM department WHERE department_faculty_id ='$id' AND department_status=1";
		$uni=mysqli_query($conn,$sql);
		echo '<option selected disabled>-เลือกภาควิชา-</option>';
		foreach($uni as $value){
			echo '<option value="'.$value['department_id'].'">'.$value['department_name'].'</option>';
		}
		exit();
	}



	if(isset($_POST['subject'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT study.study_id,subject.subject_engname,student.student_id,student.student_fname,student.student_lname,study.study_status
		FROM study 
		INNER JOIN coursesopen ON study.study_coursesopen_id=coursesopen.coursesopen_id
		INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id
		INNER JOIN student ON study.study_student_id=student.student_id
		WHERE study_coursesopen_id=" . $_POST['subject']);
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
	}

	function loadsub($username) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT coursesopen.coursesopen_id,subject.subject_engname,coursesopen.coursesopen_term,coursesopen.coursesopen_schoolyear,teacher.teacher_fname,teacher.teacher_lname,coursesopen.coursesopen_status 
		FROM coursesopen 
		INNER JOIN subject ON coursesopen.coursesopen_subject_id=subject.subject_id 
		INNER JOIN teacher ON coursesopen.coursesopen_teacher_id=teacher.teacher_id
		WHERE teacher_username='$username'");
		$stmt->execute();
		$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $authors;
	}
 

 ?>