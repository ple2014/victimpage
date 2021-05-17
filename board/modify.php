<?php include "../header.php";?>
<?php 
	if(! $_SESSION['id']){
		echo "<script>alert('로그인 하세요'); history.go(-1);</script>";
		exit;
	}

	include "../db_conn.php";
	
	$num = $_GET['num'];
	$content = $_GET['content'];
	$subject = $_GET['subject'];

	
	$sql = "select * from board where num ='$num'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	$id = $row['id'];
	$file = $row['file'];

	
	mysqli_close($conn);
?>

	<div id = "job_nav">
		<div class="job_nav_h1"><h1>게시판 </h1></div> <br>
		<p><a href = "list.php?page=<?=$page?>">게시글 목록</a></p>
		<p><a href = "write.php">게시글 작성</a></p>
	</div>
	<article id = "board_write_form">
		<form action = "board_modify.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data는 파일업로드시 반드시써야함 안쓰면, 경로명만전송됨 -->
		<h3>게시글 수정</h3>
			<table>
				<tr id="writer">
					<th>작성자 </th> 
					<td><?=$id?></td>
				</tr>
				<tr id="board_write_tr1">
					<th>제목   </th> 
					<td><input type="text" name="subject" class="subject" value = "<?=$subject?>"></td>
				</tr>
				<tr id="board_write_tr2">
					<th>내용  </th> 
					<td><textarea name="content" class="content" ><?=$content?></textarea></td>
				</tr>
				<tr>
					<th>파일 업로드  </th> 
					<td><input type="file" name="file" class="file" value= "<?=$file?>"></td>
					<td></td>
				</tr>		
			</table>
		<input type= "hidden" name="num" value=<?=$num?>>
		<input type= "submit" class= "board_write_button" value ="수정하기 ">	
		</form>
		</article>
<?php include "../footer.php";?>