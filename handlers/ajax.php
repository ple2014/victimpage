<?php

include ("../config.php");

if( isset($_REQUEST['action']) ){
    
    switch( $_REQUEST['action']){
        
        case "SendMessage":
                        
            $query = $db->prepare("INSERT INTO chat SET user=?, message=?"); //prepare : 실행         
            $query->execute(['Anonymous', $_REQUEST['message']]);
                   
         break;
         
        case "getChat":
            
            $query = $db->prepare("SELECT * FROM chat"); 
            $query->execute();
           
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            
            $chat = '';
            
            foreach( $rs as $r ){
                $chat .= '<div class="singlemessage"><strong>'.$r->user.' : </strong> '.$r->message.'<hr />';
            }
            echo $chat;
       
            break;
    }
}
?>