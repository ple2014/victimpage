<?php
session_start();

$num = $_GET['num'];

include "../db_conn.php";

$sql = "select * from board where num = '$num'";
$result = mysqli_query($conn, $sql);
$match = mysqli_fetch_array($result);

$file = $_match['file'];

$sql = "delete from board where num = '$num'";
mysqli_query($conn, $sql);

mysqli_close($conn);

if($file){
	unlink("../data/". $file);
}

echo "<script>alert('게시글이 삭제되었습니다 '); location.href = 'list.php'; </script>";

?>
