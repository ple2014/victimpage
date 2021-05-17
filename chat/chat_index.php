<?php include "../header.php"?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

	<div class="centeralised">
		<div class="chathistory"></div>
	
			<div class="chatbox">
				<form>	
				
							<h3>Chat System</h3>
								<textarea class="textarea" id="message" name="message"></textarea>
						
				</form>
			</div>
</div>

<script>

	$(document).ready(function(){
		loadChat();
	});

	$('#message').keyup(function(e){ //키를 입력할 시 작동, e는 ASCII
		var message = $(this).val(); // 입력한 값을 변수에 저장
		
		if(e.which == 13){ //13은 Enter
			$.post('/html/handlers/ajax.php?action=SendMessage&message='+message, function(response){

				loadChat();	
				$('#message').val(''); //입력한 메시지 입력창에서 초기화
		});
		}
	});

	function loadChat()
	{
		$.post('/html/handlers/ajax.php?action=getChat', function(response){
			$('.chathistory').html(response)
		});
	}

	setInterval(function(){ //A의 채팅을 B에서 보이게하기 즉, 채팅방 공유
		loadChat();
	}, 2000);
</script>



<?php include "../footer.php"?>