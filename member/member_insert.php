<?php

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	

	include "../db_conn.php";
	
	$sql = "select * from member where id='$id'";
	$result = mysqli_query($conn, $sql);
	$match = mysqli_num_rows($result);
	// mysqli_num_rows함수는 행의 개수를 담는데 위의 id값과 일치한 값이 있으면 1개이상의 결과값이 출력된다
	
	if($match)//위에서 입력한 ID값과 중복되는 ID값이 있는지 확인
	{
		echo " <script> alert('해당 ID는 이미 있습니다!'); history.go(-1); </script>";
		exit;
	}else{
		$sql = "insert into member values('','$id','$pw','$name','$email','$tel','','','')";
		mysqli_query($conn,$sql);//입력정보를 DB에 저장
	}

	mysqli_close($conn);
	?>
	<script> alert('회원가입 완료!' ); location.href='/html/member/login.php'; </script>