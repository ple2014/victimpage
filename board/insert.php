
<?php 
	session_start();

	if(! $_SESSION['id']){
		echo "<script>alert('로그인해주세요 '); location.herf = '/member/login.php'; </script>";
		exit;
	}
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$id = $_SESSION['id'];
	$date = date('Y-m-d');
	$num = $_GET['num'];
	$file = $_FILES['file']['name'];
	$tmp_file = $_FILES['file']['tmp_name'];
	$filename_ext = strtolower(array_pop(explode('.',$file)));

	
	if(! ($subject and $content) ){
		echo "<script> alert('내용을 입력해주세요 '); history.go(-1); </script> ";
		exit;
	}
	
	include "../db_conn.php";
	
	$sql = "insert into board values('', '$id', '$subject', '$content', '$date', '0', '$file')"; //첫 게시글은 조회수가 0이니 hit은 변수가 아니라 0을 대입 
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	if(is_uploaded_file($tmp_file)){ //업로드하는  파일이 있을때만 수행 
	    $allow_ext = array("jpg", "png", "hwp", "pptx", "docx", "xlsx", "pdf");
	    if(!in_array($filename_ext, $allow_ext)) {
	        echo "<script> alert('허용됟지 않은 파일입니다'); history.go(-1); </script>";
	        exit;
	    }
	    $destination = "\html\data".date('YmdHis').mt_rand().'.'.$tmp_file; 	// 파일 이름의 예: "../upload/201611092314172063257683.hwp"
		move_upload_file($tmp_file,$destination);
	}
	
	echo "<script>alert('게시글작성완료!'); location.href = 'list.php';</script>";
?>