<?php 
	session_start();
	
	if(! $_SESSION['id']){
		echo "<script>alert('로그인해주세요 '); location.herf = '/html/member/login.php'; </script>";
		exit;
	}
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$id = $_SESSION['id'];
	$date = date('Y-m-d');
	$num = $_POST['num'];
	$file = $_FILES['file']['name'];
	$tmp_file = $_FILES['file']['tmp_name'];

	if(! ($subject and $content) ){
		echo "<script> alert('내용을 입력해주세요 '); history.go(-1); </script> ";
		exit;
	}

	include "../db_conn.php";
	
	if($file){	
	$sql = "update board set subject='$subject', content='$content', date='$date', file='$file' where num='$num'";
	}else{
		$sql = "update board set subject='$subject', content='$content', date='$date' where num='$num'";
	}
	
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	if(is_uploaded_file($tmp_file)){ //업로드하는  파일이 있을때만 수행 
		$destination = "../data/". $file;
		move_upload_file($tmp_file,$destination);
	}
	
	echo "<script>alert('게시글수정완료!'); location.href = 'list.php';</script>";
?>