<?php
session_start();
    date_default_timezone_set('Asia/Seoul');
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date ( "Y-m-d h:i:s" );
    $id = $_SESSION['id'];
 
	include "../db_conn.php";

	$log = "insert into log values('','$ip','$id','$date','logout')";
	mysqli_query($conn,$log);
	
session_destroy();
	

?>
<script> alert('로그아웃'); location.href= '/html/member/info.php'; </script>