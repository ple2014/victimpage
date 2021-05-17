<?php
//채팅방 데이터베이스 ( PDO 사용 )
    $dbhost = "localhost";
    $dbname = "chat_system";
    $dbuser = "root";
    $dbpass = '';
    
    try{
        $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>