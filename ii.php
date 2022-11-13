
<!DOCTYPE HTML>
<?php
    session_start();

    $s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
    $s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
    // echo "Session ID : ".$s_id." / Name : ".$s_name;
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
			function del_check(idx){
				var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.");

				if(i == true){
					// alert("delete.php?u_idx="+idx);
					location.href = "delete.php?u_idx="+idx;
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
								<li><a href="#home1" id="top-link"><span class="icon solid fa-home">Home</span></a></li>
								<li><a href="#about" id="portfolio-link"><span class="icon solid fa-sync">출입 기록</span></a></li>
								<li><a href="#contact" id="about-link"><span class="icon solid fa-user">회원 정보</span></a></li>
								<li><a href="#contact1" id="contact-link"><span class="icon solid fa-thermometer">이상 체온 출입자</span></a></li>
							</ul>
						</nav>
				</div>
			</div>

		<!-- Main -->
			<div id="main">
				<!-- Intro -->
					<section id="home1" class="one dark cover">
						<div class="container">
							<header>
								<h2 class="alt">안면 인식 보안 시스템 <strong>sign in</strong>에 오신 것을 환영합니다.</h2><br/>
							</header>
						</div>
					</section>
					
				<!--출입 기록 페이지 -->
					<section id="about" class="two">
						<div class="container">

							<header>
								<h2>모든 회원의 출입 기록</h2>
							</header>
							
							<div>
								<button>조회</button><br/><br/>			
							</div>

							<table border = "1">
								<th>출입 기록 테이블</th>
								<tr><!--첫번째 줄 시작 -->
									<td>
										num
									</td>
									<td>
										id
									</td>
									<td>
										time
									</td>
									<td>
										body_tp
									</td>
									<td>
										state
									</td>
								</tr>
								<tr><!--두번째 줄 시작 -->
									<td>
										1
									</td>
									<td>
										2
									</td>
									<td>
										2022-05-17 00:41:31
									</td>
									<td>
										0
									</td>
									<td>
										\
									</td>
								</tr>
							</table>
						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="three">
						<div class="container">

							<header>
								<h2>회원 조회 및 수정</h2>
							</header>
							
							<div>
								<button>수정</button>
								<button >삭제</button>		
							</div>
							<table border = "1">
								<th>회원 정보 테이블</th>
								<tr><!--첫번째 줄 시작 -->
									<td>
										id
									</td>
									<td>
										name
									</td>
									<td>
										password
									</td>
									<td>
										registration
									</td>
									<td>
										role
									</td>
									<td>
										phone
									</td>
								</tr>
								<tr><!--두번째 줄 시작 -->
									<td>
										1
									</td>
									<td>
										admin
									</td>
									<td>
										1234
									</td>
									<td>
										2022-05-16 11:25:59
									</td>
									<td>
										0
									</td>
									<td>
										(NULL)
									</td>
								</tr>
							</table>
						</div>
					</section>


					<section id="contact1" class="four">
						<div class="container">
							<header>
								<h2>이상 체온자 출입 기록</h2>
							</header>
							<div>
								<button>조회</button>	
							</div>
						</div>
					</section>

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