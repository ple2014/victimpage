<?php 
	session_start();
	
	$id = $_SESSION['id'];
	$pw = $_POST['pw'];
	
	include "../db_conn.php";
	
	$sql = "select * from member where id='$id'";
	$result = mysqli_query($conn, $sql);
	$match = mysqli_fetch_array($result);
	
	if($pw != $match['pw']){
		echo "<script> alert('패스워드가 올바르지 않습니다 '); history.go(-1);</script>";
		exit;
	}else {
		$sql = "delete from member where id = '$id'";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	}

?>
	<script> alert('회원 탈퇴 완료! '); location.href='logout.php'; </script>