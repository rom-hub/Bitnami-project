<?php
session_start();
include("dbconnect.php");


session_start();
$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

if(!$s_name){
	echo "
	<script type=\"text/javascript\">
	alert(\"로그인 페이지로 이동합니다.\");
	location.href = \"../login.php\";
	</script>
	";
}

/* 쿼리 작성 */
$sql = "select * from user"; /* 받아온 idx값을 선택 */

/* 쿼리 전송 */
$result = mysqli_query($db, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>

<!DOCTYPE HTML>
<head></head>
<body>
<form name="edit_form" action="editok.php" method="post" onsubmit="return edit_check()">
<fieldset>
    <legend>정보 수정-빈칸 없이 입력해 주세요</legend>
    <p>
        <div class="txt">좌측 id를 정확하게 따라 입력해 주세요</div>
        <?php echo $id = $_GET['id'];?>
        <input type="id" name="id" id="id" class="id">
    </p>

    <p>
        <div class="txt">기존 이름</div>
        <?php echo $name = $_GET['name'];?>
        <div class="txt">바꿀 이름</div>
        <input type="text" name="name" id="name" class="name">
        
    </p>

    <p>
        <label for="pwd" class="txt">비밀번호</label>
        <input type="password" name="pwd" id="pwd" class="pwd">
        <br>
        <span class="err_pwd">* 비밀번호는 4글자만 입력할 수 있습니다.</span>
    </p>

    <p>
        <label for="repwd" class="txt">비밀번호 확인</label>
        <input type="password" name="repwd" id="repwd" class="repwd">
        <br>
        <span class="err_repwd"></span>
    </p>
    <p>
        <label for="phone" class="txt">전화번호</label>
        <input type="text" name="phone" id="phone" class="phone" value="<?php echo $array["phone"]; ?>">
        <br>
        <span class="err_phone">"-"없이 숫자만 입력</span>
    </p>

    <p class="btn_wrap">
        <button type="button" class="btn" onclick="history.back()">이전으로</button>
        <button type="button" class="btn" onclick="location.href='index.php'">홈으로</button>
        <button type="submit" class="btn">정보수정</button>
    </p>
</fieldset>
</form>
<script type="text/javascript">
function edit_check(){
    
    var pwd = document.getElementById("pwd");
    var repwd = document.getElementById("repwd");
    var phone = document.getElementById("phone");

    if(pwd.value){
        var pwd_len = pwd.value.length;
        if( pwd_len != 4){
            var err_txt = document.querySelector(".err_pwd");
            err_txt.textContent = "비밀번호는 4글자만 입력할 수 있습니다.";
            pwd.focus();
            return false;
        };
    };

    if(pwd.value){
        if(pwd.value != repwd.value){
            var err_txt = document.querySelector(".err_repwd");
            err_txt.textContent = "비밀번호를 확인해 주세요.";
            repwd.focus();
            return false;
        };
    };

    if(phone.value){
        var reg_phone = /^[0-9]+$/g;
        if(!reg_phone.test(phone.value)){
            var err_txt = document.querySelector(".err_phone");
            err_txt.textContent = "전화번호는 숫자만 입력할 수 있습니다.";
            phone.focus();
            return false;
        };
    };

    if(id.value){
        err_txt.textContent = "id를 한번더 확인해 주세요.";
    }

};
</script>
</body>
</html>