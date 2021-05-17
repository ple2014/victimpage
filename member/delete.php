<?php include "../header.php";?>
<script>
	function check(){
		if(document.member_idm.pw.value == ""){
			alert('패스워드를 확인해주세요');
			document.member_idm.pw.focus();
			return;
		} 
		if(document.member_idm.pw.value != document.member_idm.repw.value){
			alert('패스워드가 일치하지 않습니다');
			document.member_idm.pw.focus();
			return;
		}
		if(confirm('탈퇴하시겠습니까?')){
			document.member_idm.action = "member_delete.php";
			document.member_idm.submit();
		}
	}

</script>



<form name = "member_idm" id = "member_idm" method = "post">
	<h3>회원 탈퇴 </h3>
	<fieldset>
		<label>ID :</label> <?=$_SESSION['id'] ?>  												<div class = "Enter"> </div>
		<label>PW : </label>	<input type="password" name="pw"	>					<div class = "Enter"> </div>
		<label>RE PW : </label> <input type="password" name="repw">		<div class = "Enter"> </div>
	</fieldset>
	
<div id= "member_join_ok">
		<input type = "button" class = "login" value="회원탈퇴" onClick="check();" > 
		<input type = "button" class = "login" value="취소"
		onClick="javascript:location.href='../index.php';">
	</div>
</form>
<?php include "../footer.php";?>
