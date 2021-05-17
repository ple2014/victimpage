
<?php session_start();?>

<link type = "text/css" rel="stylesheet" href="/html/css/main.css">
<link type = "text/css" rel="stylesheet" href="/html/css/sub.css">
<link href="https://fonts.googleapis.com/css?family=Song+Myung&display=swap" rel="stylesheet">

<div id = "logo_container">
		<span id = "nav_main">
					<a href="/html/welcome.php"><label class="icon_font">Welcome </label>
					<img class ="icon" src="/html/image/icon_homepage.png"></a> &nbsp;&nbsp;&nbsp;&nbsp;
					<a href="/html/job/job1.php"><label class="icon_font">&nbsp;&nbsp;&nbsp;JOB</label>
					<img class ="icon" src="/html/image/icon_job.jpg"></a> &nbsp;&nbsp;&nbsp;&nbsp;
					<a href="/html/board/list.php"><label class="icon_font">Board</label>
					<img class ="icon" src="/html/image/icon_board.jpg"></a> &nbsp;&nbsp;&nbsp;&nbsp;
					<a href="/html/chat/chat_index.php"><label class="icon_font">Chatting</label>
					<img class ="icon" src="/html/image/icon_chat.jpg">  </a> 
					
					<span class = "logo">
						<a href="/html/index.php">Information Security</a>
					</span>
		</span>
		<span id = "nav_main2">
			<?php if($_SESSION['id']) {?>
				&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
				<a href="/html/member/logout.php"><label class="icon_font">Logout </label>
				<img class ="icon" src="/html/image/icon_logout.png"> </a>  &nbsp;&nbsp;
				<a href="/html/member/info.php"><label class="icon_font">Info </label>
				<img class ="icon" src="/html/image/icon_mypage.png"> </a> 
			<?php } else {?>
				&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
				 <a href="/html/member/login.php"><label class="icon_font">Login</label>
				 <img class = "icon" src="/html/image/icon_key.png"></a>&nbsp;&nbsp;&nbsp;&nbsp; 
				 <a href="/html/member/member.php"><label class="icon_font">Join</label>
				 <img class = "icon" src="/html/image/icon_mypage.png"></a> 

          	<?php }?>
		</span>
</div>



