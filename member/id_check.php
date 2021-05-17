<?php
    
	$id = $_GET['id'];

	include "../db_conn.php";
	
	$sql = "select * from member where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$match = mysqli_num_rows($result);
	

	
	if($match){
		echo "<script> alert('중복된 아이디가 존재합니다!'); window.close();</script>";
		exit;
	}else{
		echo "<script> alert('사용할 수 있는 아이디 입니다'); window.close();</script>";
		mysqli_close($conn);
	}

?>