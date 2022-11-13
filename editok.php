<?php
/* 세션 시작 */
session_start();

/*관리자 로그인*/
$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

if(!$s_name)/* 로그인 전  */ 
	echo "
	<script type=\"text/javascript\">
	alert(\"로그인 페이지로 이동합니다.\");
	location.href = \"../login.php\";
	</script>
	";

/* 이전 페이지에서 값 가져오기 */
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST["pwd"];
$role = $_POST["num"];
$phone = $_POST["phone"];

// 값 확인
echo "id : ".$id."<br>";
echo "이름 : ".$name."<br>";
echo "비밀번호 : ".$password."<br>";
echo "직급 : ".$role."<br>";
echo "전화번호 : ".$phone."<br>";
// exit;


/*  DB 접속 */
include("dbconnect.php");


/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
if(!$password){
    $sql = "update user set name = '$name', phone='$phone' where id=$id;";
} else{
    $sql = "update user set name = '$name', password='$password', phone='$phone' where id=$id;";
};
echo $sql;
// exit;


/* 데이터베이스에 쿼리 전송 */
mysqli_query($db, $sql);


/* DB(연결) 종료 */
mysqli_close($db);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"index.php\";
    </script>
";
?>