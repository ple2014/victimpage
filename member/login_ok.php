<?php
include "../db_conn.php";
session_start();
// SQLInjection 공격 방어코드 시작

    if(!get_magic_quotes_gpc()) { // PHP 5.4 ver 부터는 지원안하니 mysql_real_escape_string() 사용. 해당버전에서는 안되더라..
        $id = addslashes($_POST['id']);    
        $pw = addslashes($_POST['pw']); 
    }
    
    else {  
        $id = $_POST['id'];   
        $pw = $_POST['pw'];  
    }

//SQLInjection 공격 방어코드 끝

//BruteForce 공격 방어코드 시작
    $time1 = time();
    $sql = "select atime, count, flag from member where id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = $row['count'];
    $time2 = $row['atime'];
    $flag = $row['flag'];
    
    if($flag == 1){
        echo "<script>alert('해당 아이디에 부적절한 접근이 탐지되었습니다. 고객센터에 문의하세요');</script>";
        exit;
    }
    if(($time1-$time2) <= 1 ){//처음에는 현재시각-null이기 때문에 else문 실행
        $count++;
        if($count>10){
            $flag = 1;
            $sql = "update member set flag = $flag, count=$count where id='$id'";
            mysqli_query($conn,$sql);
            echo "<script> location.href = 'logout.php';</script>";
            exit;
        }else{
            $sql = "update member set count=$count where id='$id'";
            mysqli_query($conn, $sql);
        }
    }
    else {
        $count=1;
        $sql = "update member set atime='$time1', count=$count where id='$id'";
        mysqli_query($conn, $sql);
    }
//BruteForce 공격 방어코드 끝
date_default_timezone_set('Asia/Seoul'); //timezone을 설정안해주면 다른국가 시간으로 로그가 기록됨
$ip = $_SERVER['REMOTE_ADDR'];
$date = date ( "Y-m-d h:i:s" );

if ( !($id and $pw) ){
	echo "<script>alert('아이디 혹은  패스워드를 입력해주세요 '); history.go(-1); </script>";
	exit;
}

$sql = "select * from member where id='$id' and pw='$pw'";//$sql변수에 문자열을 담는다 
$result = mysqli_query($conn,$sql); //$conn 을 통해 연결된 DB로 $sql 쿼리를 실행시키는 함수
$match = mysqli_num_rows($result); // result 에 담겨 있는 sql쿼리 테이블의 행 개수를 match변수에 담는다


if (! $match){
    $log = "insert into log values('','$ip','$id','$date','fail')";
    mysqli_query($conn,$log);
	echo "<script>alert('등록되지 않은 정보입니다 '); history.go(-1); </script>";
	exit;
}else{
	
	$row = mysqli_fetch_array($result); //레코드를 1개씩 리턴해주는 함수 
    $_SESSION['id'] = $row['id'];

    $log = "insert into log values('','$ip','$id','$date','success')";
    mysqli_query($conn,$log);

    }
    

mysqli_close($conn);
?>
<script>alert('로그인 성공'); location.href='/html/member/info.php';</script>

