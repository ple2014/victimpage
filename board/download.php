<?php
session_start();
if(! $_SESSION['id'])
{
	echo "<script>alert('로그인 하세요'); location.href='/html/member/login.php';</script>";
	exit;
}
$file = $_GET['file'];
/* 작동안됨..
function check_download($file){//파일 다운로드취약점 방어코드
    $black_list = array( '\.\.\/', '\.\/', '\%', '\.\.\\\\', '\.\\\\ ');
    $lowerFile = strtolower($file);
    for($i=0; $i<count($black_list); $i++){
        $is_unsafe=preg_match($black_list[$i],$lowerFile); // preg_match 는 ereg 대체함수
        if($is_unsafe){ break; }
    }
    return $is_unsafe;
}

if(trim($file)!=""){
    if(check_download($file)){
        echo "<script>alert('다운로드를 허용하지 않은 파일명/경로입니다');</script>";
        exit;
      }
}else {exit;}
*/
header("content-disposition: attachment; filename = " . $file);
//http 프로토콜에 첨부파일이 달려있다고 알려주는 것
//http프로토콜은 파일전송의 목적이 프로토콜이 아니기 때문에 기본값으로 파일전송이 없다.. 파일전송목적의 프로토콜은 ftp 
$fp = fopen("../data/" . $file, "r");
fpassthru($fp);
fclose($fp);
?>