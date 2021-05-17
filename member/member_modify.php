<?php 
	session_start();
	
	$id = $_SESSION['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];

		if(! $pw){
			echo"<script> alert('패스워드를  입력해주세요 '); location.href='modify.php';</script>";
			exit;
		}
		if(! $name){
			echo"<script> alert('이름을   입력해주세요 '); history.go(-1);</script>";
			exit;
		}
		if(! $email){
			echo"<script> alert('이메일을   입력해주세요 '); history.go(-1);</script>";
			exit;
		}
		if(! $tel){
			echo"<script> alert('전화번호를  입력해주세요 '); history.go(-1);</script>";
			exit;
		}

	include "../db_conn.php";

	$sql = "update member set pw = '$pw', name='$name', email='$email' , tel = '$tel' where id='$id'";
    mysqli_query($conn,$sql);

	mysqli_close($conn);
?>
<script>alert('회원정보 수정 완료!'); location.href = 'info.php';</script>