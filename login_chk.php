<?php
  session_start();

  #DB connect 이전 페이지에서 값 가져오기
  $u_id = $_POST["id"];
  $pwd = $_POST["pw"];
  #null instance chk

  #DB connect
  include("dbconnect.php");

  $sql = "SELECT name, password FROM user where name='$u_id';";
  $result = mysqli_query($db,$sql);
  $num = mysqli_num_rows($result);
  #login process = "select idx, u_name, u_id, pwd from members where u_id='';";

  if(!$num){ // 아이디가 존재하지 않으면
    // 메세지 출력 후 이전 페이지로 이동
    echo "
        <script type=\"text/javascript\">
            alert(\"일치하는 아이디가 없습니다.\");
            history.back();
        </script>
    ";
    exit;
} else{ // 아이디가 존재하면

    // DB에서 사용자 정보 가져오기
    $array = mysqli_fetch_array($result);
    $g_pwd = $array["password"];

    // 사용자가 입력한 비밀번호와 DB에 저장된 비밀번호가 일치하지 않는다면
    if($pwd != $g_pwd){
        echo "
            <script type=\"text/javascript\">
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
    exit;
    } else{ // 비밀번호가 일치한다면
        // 세션 변수 생성
        // // $_SESSION["세션변수명"] = 저장할 값;
        // $_SESSION["s_idx"] = $array["num"];
        $_SESSION["s_name"] = $array["name"];
        $_SESSION["s_pw"] = $array["password"];
        // echo "idx : ".$_SESSION["s_idx"]." / "."NAME : ".$_SESSION["s_name"]." / "."ID : ".$_SESSION["s_id"];

        /* DB 연결 종료 */
        mysqli_close($db);

        /* 페이지 이동 */
        echo "
            <script type=\"text/javascript\">
                location.href = \"../index.php\";
            </script>
        ";
    };
};

 ?>