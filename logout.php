<?php
session_start();

/* 세션 삭제 */
unset($_SESSION["s_name"]);
unset($_SESSION["s_pw"]);

/* 페이지 이동 */
echo "
    <script type=\"text/javascript\">
        alert(\"로그아웃 되었습니다.\");
        location.href = \"../login.php\";
    </script>
";
?>