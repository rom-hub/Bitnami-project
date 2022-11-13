<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style type="text/css">
    html {background: rgba(140, 140, 140, 0.171);}
    body {display: flex; justify-content: center; align-items: center; min-height: 70vh}
    body,select,option,button{font-size:20px}
    input{border:1px solid #999;font-size:20px;padding:10px 20px}
    input,button{vertical-align:middle}
    form{width:350px;margin:auto}
    span{font-size:20px;color:#f00}
    p span{display:block;margin-left:90px}
    button{cursor:pointer}
    .txt{display:inline-block;width:80px}

</style>
  </head>
  <body>
    <?php
    if(isset($_SESSION['s_name'])){
      echo "
      <script type=\"text/javascript\">
      alert(\"이미 로그인 돼 있습니다.\");
      location.href = \"../index.php\";
      </script>
      ";
    }

    if(!isset($_SESSION['s_name']) || !isset($_SESSION['s_pw'])){?>
      <form method="POST" action="login_chk.php">
        <center id="main">
          <div class = "logo">
            <span><img src="img/logo.png" alt="" width="230" height="90"/></span><br/><br/>
            </div>
          <div>
          <label>
          ID <input type='text' name='id' placeholder='id' id="userid"><br/><br/>
            </label>
            <!--login pw-->
            <label>
          PW <input type='password' name='pw'  placeholder='pw' id="userpw"><br/><br/>
            </label>
            <input type='submit' value='submit' id='signinButton'>
            <?php
      } ?>
        </center>
        </div>
      </form>
  </body>
</html>