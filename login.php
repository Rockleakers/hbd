<?php
require 'config.php';
if(isset($_SESSION["userid"])){
    header("Location: data.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $client_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM hbd.client WHERE username = '$username'"));
    $admin_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM hbd.admin WHERE username = '$username'"));
    echo $admin_id;
    if(isset($client_id) && $password == $client_id["password"]){
        $_SESSION["userid"] = $client_id["id"];
		$_SESSION["user"] = "client";
		header("Location: data.php");
	}
	elseif($username == $admin_id["username"] && $password == $admin_id["password"]){
        $_SESSION["userid"] = $admin_id["id"];
		$_SESSION["user"] = $admin_id["username"];
		header("Location: data.php");
	}
    else{
        echo "<script> alert('Wrong Password or Email'); </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toppers & Number of Students</title>
	<link rel="stylesheet" type="text/css" href="../school/stylish.css">
	<link rel="stylesheet" type="text/css" href="../school/fontawesome-free-5.15.4-web\css\all.css">
	<style type="text/css">
		.login-container{
			/* position: relative; */
			display: flex;
			justify-content: center;
			align-items: center;
			background: var(--background-color);
		}
		.login-box{
			max-width: 380px;
			padding: 5%;
			/* position:absolute;
			top:45%;
			left:50%; */
			/* transform:translate(-50%,-50%); */
			color:var(--primary-color);
		}
		.login-box h1{
			float:left;
			font-size:40px;
			border-bottom:6px solid var(--primary-color);
			margin-bottom:50px;
			padding:13px 0;
		}
		.textbox{
			width:100%;
			color:var(--primary-color);
			overflow:hidden;
			font-size:20px;
			padding:8px 0;
			margin:8px 0;
			border-bottom:1px solid var(--primary-color);
		}
		.textbox i{
			width:26px;
			float:left;
			text-align:center;
		}
		.textbox input{
			border:none;
			outline:none;
			background:none;
			color:var(--primary-color);
			font-size:18px;
			width:80%;
			float:left;
			margin:0 10px;
		}
		.btn{
			width:100%;
			background:#0f6fd5;
			border:1px solid #0f6fd5;
			color:#fff;
			padding:5px;
			font-size:18px;
			cursor:pointer;
			margin:12px 0;
		}
        .btn:hover{
            background: #0f6fd5;
            color: #fff;
        }
		::placeholder{
			color:var(--primary-color);
		}
		.check{
			width: 100%;
		}
		a{
			/* float: right; */
			text-decoration: none;
			color: var(--primary-color);
		}
	</style>
</head>
<body>
	<div id="preloader"></div>
<section class="sub-header">
	<nav>
		<a class="nav-img" href="index.html"><img class="imglogo"></a>
		<div class="nav-links" id="navlinks">
			<i class="fa fa-times" onclick="hideMenu()"></i>
			<div class="menu-bar">
				<ul>
					<li><a href="index.html"><i class="fas fa-home"></i> HOME</a></li>
					<li><a href="about.html"><i class="fas fa-user"></i> ABOUT</a></li>
					<li><a href="course.html"><i class="fas fa-chalkboard-teacher"></i> COURSE</a></li>
					<li><a href="management.html"><i class="fas fa-users"></i> MANAGEMENT</a></li>
					<li><a href="#" class="active"><i class="fas fa-link"></i> QUICK-LINKS</a>
						<div class="sub-menu-1">
							<ul>
								<a href="Monthly_News.html"><li>Monthly Magazine</li></a>
								<a href="Uniform & Fees.html"><li>Uniform & Fees</li></a>
								<a href="Toppers & Number of Students.html"><li>Toppers & Number of Students (LKG to XII)</li></a>
								<a href="Infra.html"><li>Infrastructure</li></a>
								<a href="Extra Curricular Activities.html"><li>Extra Curricular Activities</li></a>
								<a href="Curriculum & Sports.html"><li>Curriculum & Sports</li></a>
								<a href="Teaching & Non-teaching Staff.html"><li>Teaching & Non-teaching Staff</li></a>
								<a href="Application for Transfer Certificate.html"><li>Application for Transfer Certificate</li></a>
								<a href="School Calender 2019-2020.html"><li>School Calender 2019-2020</li></a>
								<a href="Affiliation.html"><li>Affiliation</li></a>
								<a href="Journals.html"><li>Journals & News Paper Details</li></a>
							</ul>
						</div>
					</li>
					<li><a href="contact.html"><i class="fas fa-phone"></i> CONTACT</a></li>
					<li><a href="javascript:void(0)"><i class="fas" id="icon"></i> THEME</a>
						<div class="sub-menu-1">
							<ul>
								<a href="javascript:void(0)" id="light"><li>Light <i class="fas fa-sun"></i></li></a>
								<a href="javascript:void(0)" id="dark"><li>Dark <i class="fas fa-moon"></i></li></a>
								<a href="javascript:void(0)" id="color"><li>Color <i class="fas fa-circle"></i></li></a>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<i class="fa fa-bars" onclick="showMenu()"></i>
	</nav>
	<h1>Admin verification </h1>
</section>

<section class="login-container">
	<div class="row">
		<form class="" action="" method="post">
			<div class="login-box" id="login">
				<h1>Login</h1>
				<div class="textbox">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="username" value="">
				</div>			
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" name="password" value="">
				</div>
				<div class="check">
					<!-- <input type="checkbox" id="remember" name="remember" value="remember"> -->
					<!-- <label for="remember">Forgotten your password?</label> -->
					<a href="#" style="float: right;">Forgotten your password?</a>
				</div>
				<br>
				<button class="btn hero-btn" type="submit" name="submit">Sign in</button>
                <p>Don't have an account? <a href="register.php" style="float: right;">Register</a></p>
			</div>
		</form>
	</div>
</section>

<!------------footer---------->

<section class="footer">
	<h4>About Us</h4>
	<p>The school was founded in the year 1978 under the name The Fathima English School by our beloved correspondent Late. Mrs. Durrai Shawar Begum. A minority institution managed by the teams trust a non-profiteering society registered under the Tamil Nadu Societies Registration Act of 1975</p>
	<div class="icons">
		<a href="https://www.facebook.com/Fathima-CBSE-School-Saidapet-156711031181530/" target="_blank"><i class="fab fa-facebook"></i></a>
		<i class="fab fa-twitter"></i>
		<i class="fab fa-instagram"></i>
		<i class="fab fa-linkedin"></i>
	</div>
	<p>Made with <i class="far fa-heart"></i> by MGR Team</p>
</section>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS --//-->
<script src="../school/layout/scripts/jquery.min.js"></script>
<script src="../school/layout/scripts/jquery.backtotop.js"></script>
<script src="../school/layout/scripts/jquery.mobilemenu.js"></script>
<script src="custom2.js"></script>
<script src="../school/untitled.js"></script>
<!------------JavaScript for Toggle Menu----------->
<script type="text/javascript">
	var navlinks=document.getElementById('navlinks');
	function showMenu() {
		navlinks.style.right="0";
	}
	function hideMenu(){
        navlinks.style.right="-200px";
	}
</script>
<script type="text/javascript">
   var loader=document.getElementById("preloader");
   window.addEventListener("load",function(){
    loader.style.display="none";
})
</script>
<script type="text/javascript">
    const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) =>{
            console.log(entry)
			if (entry.isIntersecting){
                entry.target.classList.add('show');
			} 
			// else {
			// 	 	entry.target.classList.remove('show');
			// 	}
			});
		});		
	const hiddenElements = document.querySelectorAll('.hidden');
	hiddenElements.forEach((el) => observer.observe(el));
</script>
</body>
</html>