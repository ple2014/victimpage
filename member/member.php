<?php include "../header.php";?>
<script>
	function check(){
		if(document.member_form.id.value == ""){
			alert ('아이디를 입력해주세요');
			document.member_form.id.focus(); //해당 텍스트박스에 커서이동
			return;
		}
		if(document.member_form.pw.value == ""){
			alert('패스워드를 입력해주세요 ');
			document.member_form.pw.focus();
			return;
		}
		if(document.member_form.pw.value != document.member_form.repw.value){
			alert('패스워드를 확인해주세요');
			document.member_form.repw.focuse();
			return;
		}
		if(document.member_form.name.value == ""){
			alert('이름을 입력해주세요 ');
			document.member_form.name.focus();
			return;
		}
		if(document.member_form.email.value == ""){
			alert('이메일을 입력해주세요 ');
			document.member_form.email.focus();
			return;
		}
		if(document.member_form.tel.value == ""){
			alert('전화번호를 입력해주세요');
			document.member_form.tel.focus();
			return;
		}			
document.member_form.action = "member_insert.php";
document.member_form.submit();
}
	function duplicate(){
		var userid = document.member_form.id.value;
		if(userid == ""){
			alert('아이디를 입력해주세요 ');
			return;
		}else
		url = "id_check.php?id="+userid;
		window.open(url,"duplicate", "width=400, height=200");//window.open(팝업주소,팝업창이름,팝업창 설정)
	}
	
</script>

<form method ="post" class = "member_form" name = "member_form" >
	<div id= "member"><h1>JOIN</h1></div><br><br>
	
			<p><label>ID  </label>&nbsp;
			<input type ="text" class = "member_input" name="id" >
			<input type ="button" class = "duplicate" value ="중복확인" onClick="duplicate();" ></p>
			<div class="member_line"></div>
			<p><label>PW </label>&nbsp;
			<input type ="password" class = "member_input" name="pw"></p>
			<div class="member_line"></div>
			<p><label>REPW </label>&nbsp;
			<input type ="password" class = "member_input" name="repw"></p>
			<div class="member_line"></div>
			<p><label>NAME </label>&nbsp;
			<input type ="text" class = "member_input" name="name"></p>
			<div class="member_line"></div>
			<p><label>E-MAIL </label>&nbsp;
			<input type = "text" class = "member_input" name="email"></p>
			<div class="member_line"></div>
			<p><label>TEL </label>&nbsp;
			<input type = "text" class = "member_input" name="tel"></p>
			<div class="member_line"></div>
			<br><br>
		<div id= "member_join_ok">
			<input type = "button" class="login" value="회원가입" onClick="check();" > 
			<input type = "button" class="login" value="취소" onClick="javascript:location.href='/html/member/info.php';">
		</div>
</form>

<?php include "../footer.php";?>