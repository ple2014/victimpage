<?php include "../header.php";?> 

<?php 
	$id = $_SESSION['id'];

	include "../db_conn.php";
	$sql = "select * from member where id='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
?>

<form method ="post" name = "member_form">
<fieldset id = "member_idm">
	<p><label>아이디  </label>&nbsp;&nbsp;&nbsp; <?= $id?>
	<p><label>이름 </label>&nbsp;&nbsp;&nbsp; <?=$row['name']?></p>
	<p><label>이메일 </label>&nbsp;&nbsp;&nbsp; <?=$row['email']?></p>
	<p><label>전화번호 </label>&nbsp;&nbsp;&nbsp; <?=$row['tel']?></p>
</fieldset>
</form>
<div id="member_modify_ok">
	<input type ="button" class="modify" onClick="javascript:location.href='modify_entrance.php';" value="회원정보수정">
	<input type ="button" class="modify" onClick="javascript:location.href='delete.php';" value="회원탈퇴">
</div>
<?php include "../footer.php";?>