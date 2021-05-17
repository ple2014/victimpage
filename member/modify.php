<?php include "../header.php";?>


<?php 
        $id = $_SESSION['id']; //웹프락시로 요청메시지 변조 방어를 위해 session으로 받는다. post로 받으면 client 요청이 변조되서 올 수 있기때문
		include "../db_conn.php";
		$sql = "select * from member where id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
?>

<form method ="post" name = "member_form" action="member_modify.php">
<fieldset id = "member_idm">
	<p><label>아이디  </label>&nbsp;&nbsp;&nbsp; <?=$row['id'];?>
	<p><label>패스워드 </label>&nbsp;&nbsp;&nbsp;
	<input type="password" class = "modify_input" name="pw">
	<p><label>이름 </label>&nbsp;&nbsp;&nbsp;
	<input type ="text" class = "modify_input" name="name" value=<?=$row['name']?>></p>
	<p><label>이메일 </label>&nbsp;&nbsp;&nbsp;
	<input type = "text" class = "modify_input" name="email" value=<?=$row['email']?>></p>
	<p><label>전화번호 </label>&nbsp;&nbsp;&nbsp;
	<input type = "text" class = "modify_input" name="tel" value=<?=$row['tel']?>></p>
</fieldset>
	<div id= "member_modify_ok">
		<input type = "submit" class="modify" value="회원정보수정" > 
		<input type = "button" class="modify" value="취소"
		onClick="javascript:location.href='../index.php';">
	
	</div>
</form>

<?php include "../footer.php";?>