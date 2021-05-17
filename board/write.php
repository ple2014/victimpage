<?php include "../header.php";?>
<?php 
	if(! $_SESSION['id']){
		echo "<script>alert('로그인 하세요'); history.go(-1);</script>";
		exit;
	}

	$num = $_GET['num'];
	$page = $_GET['page'];
	$id = $_SESSION['id'];
	
?>
	<div id = "job_nav">
		<div class="job_nav_h1"><h1>게시판 </h1></div> <br>
		<p><a href = "list.php?page=<?=$page?>">게시글 목록</a></p>
		<p><a href = "write.php">게시글 작성</a></p>
	</div>
	
	<article id = "board_write_form">
		<form action = "insert.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data는 파일업로드시 반드시써야함 안쓰면, 경로명만전송됨 -->
		<h3>게시글 작성</h3>
			<table>
				<tr id="writer">
					<th>작성자 </th> 
					<td><?=$id?></td>
				</tr>
				<tr id="board_write_tr1">
					<th>제목   </th> 
					<td><input type="text" name="subject" class="subject"></td>
				</tr>
				<tr id="board_write_tr2">
					<th>내용  </th> 
					<td><textarea name="content" class="content"></textarea></td>
				</tr>
				<tr>
					<th>파일 업로드  </th> 
					<td><input type="file" name="file" class="file"></td>
					<td></td>
				</tr>		
			</table>
		
		<input type= "submit" class= "board_write_button" value ="글쓰기">	
		</form>
		</article>
<?php include "../footer.php";?>