<?php include "../header.php";?>

<?php
	include "../db_conn.php";
	
	$num = $_GET['num'];

	$page = $_GET['page'];
	
	$sql = "select * from board where num ='$num'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	$id = $row['id'];
	$subject = $row['subject'];
	$content = $row['content'];
	$hit = $row['hit'];
	$date = $row['date'];
	$file = $row['filename'];
	$hit++;
	$sql = "update board set hit = '$hit' where num='$num'";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	
?>	

	<div id = "job_nav">
		<div class="job_nav_h1"><h1>게시판 </h1></div> <br>
		<p><a href = "list.php?page=<?=$page?>">게시글 목록</a></p>
		<p><a href = "write.php">게시글 작성</a></p>
	</div>
	
	<article id = "board_write_form">
		<form enctype="multipart/form-data"> <!-- enctype="multipart/form-data는 파일업로드시 반드시써야함 안쓰면, 경로명만전송됨 -->
		 <div class = "board_view_file">첨부파일 :<a href = "download.php?file=<?=$file?>"> <?= $file?></a></div><br>
			<fieldset id = "board_view_form_div0">
					<div class = "board_view_form_div1"><?=$subject?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<?=$id?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=$date?>&nbsp;&nbsp;|&nbsp;&nbsp;조회수 : <?=$hit?> </div>
					<div class = "board_view_form_div2"><?= $content?></div>
			</fieldset>
		<?php if($_SESSION['id']) {?>	
			<a href ="modify.php?subject=<?=$subject?>&content=<?=$content?>&file=<?=$file?>&num=<?=$num?>"><input type= "button" class= "board_write_button" value ="글수정"></a>
			<a href ="delete.php?num=<?=$num?>"><input type= "button" class= "board_delete_button" value ="글삭제" ></a>
		<?php } ?>
		
		</form>
		</article>
		
	<?php include "../footer.php";?>