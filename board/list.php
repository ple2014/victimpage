<?php	include "../header.php"; ?>

<?php 
	$page = $_GET['page'];
   	$num = $_GET['num'];

	
	if(! $page){ //처음 실행할 때는 page 변수에 값이 없으므로 1을 넣어준다 
		$page = 1;
	}
	
	$sql = "select * from board order by num desc";
	
	include "../db_conn.php";
	
	$result = mysqli_query($conn, $sql);
	$record = mysqli_num_rows($result);
	$scroll = 5; // 한 페이지에 보여줄  게시글  개수 
	
	if($record % $scroll == 0){ //record는 게시글 총 개수 
		$total_page = $record / $scroll;  //total_page는 페이지 개수 
	} else{
		$total_page = ceil($record / $scroll);
	}
	$start = ($page-1)*$scroll; //페이지 초기값 설정
	$number = $record - $start;
		?>
	<div id = "job_nav">
		<div class="job_nav_h1"><h1>게시판 </h1></div> <br>
		<p><a href = "list.php?page=<?=$page?>">게시글 목록</a></p>
		<p><a href = "write.php">게시글 작성</a></p>
	</div>

<article id = "board_list_form">
		<h3>게시글 목록</h3>
		<table>
			<tr>
				<th>번호</th>
				<th>제목 </th>
				<th>작성자</th>
				<th>날짜 </th>
				<th>조회수</th>
			</tr>
		<?php 
		for($i=$start; $i<$scroll+$start && $i<$record; $i++)
		{
			mysqli_data_seek($result, $i); //원하는 순번의 데이터를 선택하는데 사용
			$row = mysqli_fetch_array($result);
		?>
				<tr>
					<td><?=$number?></td>
					<td class="subject">
						<a href="view.php?num=<?=$row['num']?>&page=<?=$page?>"><?=$row['subject']?></a>
					</td>
					<td><?=$row['id']?></td>
					<td><?=$row['date']?></td>
					<td><?=$row['hit']?></td>
			</tr>
				<?php 
			$number--;
				}?>
		</table>
	</article>

<form action="list_search.php" method = "get" id="board_list_find">
	<select name ="find">
		<option value="subject" >제목 </option>
		<option value="id" >작성자 </option>
	</select>
	<input type ="text" name = "data">
	<input type ="submit" value = "검색">
</form>

	<div id = "page">
		<?php if($page <= 1) { //PREV
			echo "<a href = 'list.php?page=1'> PREV </a>";			
			}else{
				$page--;
				echo "<a href = 'list.php?page=$page'> PREV </a>";
				$page++;			
			}
			for($i=1; $i<=$total_page; $i++){ //현재 페이지번호 
				if($i == $page){
					echo "<b>$i</b>";
				}else{
					echo "<a href = 'list.php?page=$i'>$i </a>";
				}
			}
			if($page>=$total_page){ //NEXT
				echo "<a href ='list.php?page=$total_page'> NEXT </a>";
			}else{
				$page++;
				echo "<a href ='list.php?page=$page'> NEXT </a> ";
				$page--;
			}
			?>
	</div>
	<?php if($_SESSION['id']) {?>
		<input type= "button" class= "board_list_button" value ="글쓰기" onClick = "javascript:location.href = 'write.php'">
		<?php }?>
<?php include "../footer.php";?>
