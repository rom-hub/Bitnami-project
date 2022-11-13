<!DOCTYPE HTML>

<?php
    session_start();
    $s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
    $s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
    // echo "Session ID : ".$s_id." / Name : ".$s_name;
	
	include("dbconnect.php");	
?>

<?php if(!$s_name)/* 로그인 전  */ 
	echo "
	<script type=\"text/javascript\">
	alert(\"로그인 페이지로 이동합니다.\");
	location.href = \"../login.php\";
	</script>
	";
?>

<html lang="ko">
	<head>
		<title>Signin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="assets/css/main1.css" />
		<script type="text/javascript">
			function del_check(id){
				var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.");

				if(i == true){
					location.href = "delete.php?id="+id;
				};
			};
   		</script>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">
				<div class="top">
					<!-- Logo -->
						<?php if($s_name) {?>
							<div id="logo">
							<p>
							<a href="logout.php" class="bar">로그아웃</a>
							</p>
							<span class="image logo"><img src="images/logo.png" alt="" /></span>
							<h1 id="title">관계자 님</h1>
							<p>안녕하세요</p>
						</div>
						<?php }; ?>
						
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#about" id="about-link"><span class="icon solid fa-user">회원 정보</span></a></li>	
								<li><a href="#contact" id="portfolio-link"><span class="icon solid fa-sync">출입 기록</span></a></li>
								<!-- <li><a href="#contact1" id="contact-link"><span class="icon solid fa-thermometer">이상 체온 출입자</span></a></li> -->
							</ul>
						</nav>
				</div>
			</div>
		<!-- Main -->
			<div id="main">
				<!--출입 기록 페이지 -->
					<section id="about" class="two">
						<div class="container">
							<header>
								<h2>회원 정보 테이블</h2>
							</header>
							<table class="table table--block" cellspacing="0" cellpadding="0">
                                <thead>
								<tr>
									<td style="width:10%">번호</td>
									<td>이름</td>
									<td>비밀번호</td>
									<td>가입날짜</td>
									<td>직급</td>
									<td>휴대폰번호</td>
									<td>수정</td>
									<td>삭제</td>
								</tr>
                                </thead>
                                <tbody>
                                <?php
                                /* DB 연결 */
								$sql = "select * from user;";
                                $result = mysqli_query($db,$sql);
								/*회원정보 가져오기*/
                                while($array = mysqli_fetch_array($result)){
								?>
								<tr class="brd">
									<td><?php echo $array["id"]; ?></td>
									<td><?php echo $array["name"]; ?></td>
									<td><?php echo $array["password"]; ?></td>
									<td><?php echo $array["registration"]; ?></td>
									<td><?php echo $array["role"]; ?></td>
									<td><?php echo $array["phone"]; ?></td>
									<td><a href="edit.php?id=<?php echo $array["id"];?>&name=<?php echo $array["name"]?>">수정</a></td>
									<td><a href="#" onclick="del_check(<?php echo $array["id"]; ?>)">삭제</a></td>
								</tr>
								<?php  
									/* $i++; */
									/* paging */
									$cnt++;
								}; 
								?>
                            </tbody>
                            </table>
						</div>
					</section>
                    <!-- Contact -->
					<section id="contact" class="three">
						<div class="container">

						<header>
							<h2>출입 기록 테이블</h2>
						</header>
						
						<div class="table-wrap">
    						<div class="table-box table-box--vertical">
							<table class="table table--vertical" cellspacing="0">
                                <thead>
								<tr>
									<td>번호</td>
									<td>이름</td>
									<td>인증 시간</td>
									<td>온도</td>
									<td>상태</td>
								</tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM record;";
                                $result = mysqli_query($db,$sql);
								/*회원정보 가져오기*/
                                while($array = mysqli_fetch_array($result)){
									?>
									<tr class="brd">
										<td><?php echo $array["num"]; ?></td>
										<td><?php echo $array["id"]; ?></td>
										<td><?php echo $array["time"]; ?></td>
										<td><?php echo $array["body_tp"]; ?></td>
										<td><?php echo $array["state"]; ?></td>
									</tr>
									<?php 
									}; 
									?>
                                </tbody>
                            </table>
							</div>
							</div>
						</div>
					</section>


					<!-- <section id="contact1" class="four">
						<div class="container">
							<header>
								<h2>이상 체온자 출입 기록</h2>
							</header>
							<div>
								<button>조회</button>	
							</div>
						</div>
					</section> -->
			</div>

		<!-- Footer -->
			<div id="footer">
				<a class="project">@2022 창의공학설계</a>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script> 
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
