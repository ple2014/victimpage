<?php include "../header.php"; ?>

    <form action="login_ok.php"  id="login_form" method="post">
    <div id="login"><h1>Login</h1></div><br>
		<img src="/html/image/icon_login_id.png">
    	<input type="text" class="id" name="id">
    	<div class = "login_line"></div><br>
    	<img src="/html/image/icon_login_pw.png">
    	<input type="password" class="pw" name="pw">
		<div class = "login_line"></div><br>
    	<input type="submit" class = "login" value="Sign In">
    </form>

<?php include "../footer.php";?>
