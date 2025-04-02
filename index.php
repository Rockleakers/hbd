<?php

// $conn = mysqli_connect("sql310.infinityfree.com","if0_34531533","8z09k5BLOIhiEo","if0_34531533_school");
// $connip = mysqli_connect("sql310.infinityfree.com","if0_34531533","8z09k5BLOIhiEo","if0_34531533_ipaddress");
// $conn = mysqli_connect("localhost","root","789456123","hbd");
// $connip = mysqli_connect("localhost","root","789456123","ipaddress");
// $id = 3;
// session_start();

// $oldquery = "SELECT id FROM tb_data ORDER BY id DESC LIMIT 1";
// $result = mysqli_query($connip, $oldquery);
// $oldrecord = mysqli_fetch_assoc($result);
// // echo $oldrecord['id'] . "<br>";
// $_SESSION['id'] = $oldrecord['id'];
// $newid = $_SESSION['id'] + 1;
// // echo $newid;

if(isset($_POST["submit"])){
	date_default_timezone_set("Asia/Kolkata");
	$date = date("d-m-Y h:i:sa");

	$username = $_POST["username"];
    $email = $_POST["hbd_name"];
    $password = $_POST["password"];
    $comment = $_POST["greetings"];

	if($_FILES["fileImg"]["error"] === 4){
		echo "<script> alert('Please add image'); </script>";
		// exit;
		$newImageName = "nouser.jfif";
	}
	else{
		$fileName = $_FILES["fileImg"]["name"];
		$fileSize = $_FILES["fileImg"]["size"];
		$tmpName = $_FILES["fileImg"]["tmp_name"];

		$validImageExtension = ['jpg', 'jpeg', 'png', 'jfif'];
		$imageExtension = explode('.' , $fileName);
		$name = $imageExtension[0];
		$imageExtension = strtolower(end($imageExtension));
		if(!in_array($imageExtension, $validImageExtension)){
			echo "<script> alert('Invalid Image Extension'); </script>";
			// exit;
		}
        else{
            $newImageName = $name . "-" . uniqid();
			$userNameImage = $newImageName;
			$userFileName = $userNameImage . '.html';
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        }

		$file=fopen("users/$userNameImage".".html","w");

		fwrite($file,"<!DOCTYPE html>
		<html>
		<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title></title>
		<link rel='stylesheet' type='text/css' href='../styles1.css'>
		</head>
		<body>
		<div class='card'>
		<div class='imgbox'>
		<h1>Happy<br> Birthday!</h1>
		<p class='mobile'>Click me!</p>
		<p class='pc'>Hover me!</p>
		<img src='../uploads/$newImageName'>
		</div>
		<div class='details'>
		<div class='content'>
		<div class='para'>

		<p id='greetings' style='white-space: pre-wrap;'>$comment</p>
		<center><h4>from</h4></center>
		<p class='signed'>$username</p>
		</div>
		</div>
		</div>
		</div>
		<script src='../custom.js'>
		</script>
		</body>
		</html>");
		fclose($file);
		echo "<script> alert('Success!'); </script>";
		echo "
		<div class='box-container' id='ModalBoxContainer'>
			<div class='modalbox' id='modalBox'>
				<img src='uploads/$userNameImage.$imageExtension' class='show-image'>
				<div class='link'>
					<a href='users/$userNameImage.html' target='_blank'>Click to view your greetings</a>
				</div>
				<img src='close-icon.png' class='close' onclick='closeBox();'>
			</div>
		</div>
		<div class='bottom'>
			<button onclick='showbox();'>Show previous greetings</button>
		</div>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>Happy Birthday My frnd</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Rebison">
	<link rel="icon" type="image/png" href="204.png">
	<link rel="stylesheet" type="text/css" href="stylish.css">
	<link rel="stylesheet" type="text/css" href="styles1.css">
	<!-- <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web\css\all.css"> -->
	<style>
		.box-container{
			height: 100%;
			width: 100%;
			background: rgba(0, 0, 0, 0.75);
			position: absolute;
			z-index: 2020;
		}
		.modalbox{
			position: absolute;
			transform: translate(-50%, -50%);
			text-align: center;
			top: 50%;
			left: 50%;
			padding: 40px 20px;
			max-width: 350px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 1);
			background: rgba(255, 255, 255, 1);
		}
		.show-image{
			max-width:300px;
			margin: auto;
			padding: 20px 0;
			user-select: none;
		}
		.link a{
			text-decoration: none;
			color: red;
		}
		.close{
			position: absolute;
			padding: 5px;
			width: 40px;
			right: 0;
			top: 0;
			cursor: pointer;
		}
		
		body{
			display: block;
			justify-content: center;
			align-items: center;
			min-height: auto!important;
			background: none;
		}
		.card{
			position: relative;
			width: calc(500px - 15%);
			height: calc(500px - 15%);
			background: #ffefef;
			transform-style: preserve-3d;
			transform: perspective(1000px);
			box-shadow: 10px 20px 40px rgba(0, 0, 0, 1);
			transition: 2s;
		}
		.imgbox h1{
			width: 100%;
			padding-top: 2em;
			text-align: center;
			font-family: 'Nobile', sans-serif;
			font-style: italic;
			font-size: 50px;
			line-height: 1.2em;
			text-shadow: 4px 4px 0px rgb(0 0 0 / 15%), 1px 1px 0 rgb(255 200 200), 2px 2px 0 rgb(255 150 150), 3px 3px 0 rgb(255 125 125);
			color: #FFF;
		}
		.card{
			transform: translateX(50%);
		}
		.card:hover .imgbox{
			transform: rotateY(-180deg);
		}
		.imgbox p{
			position: absolute;
			bottom: 1em;
			right: -1em;
			color: #fff;
			text-align: right;
		}
		.para p{
			margin: 0;
			font-size: 1em;
			font-family: 'Nobile';
			color: #331717;
			font-style: italic;
			line-height: normal;
		}
		p{
			width: 100%;
			word-break: normal;
			overflow-wrap: anywhere;
			white-space: pre-wrap !important;
		}
		p{
			padding: 5px;
		}
		p.signed {
			margin-top: 1em;
			text-align: center;
			font-family: 'Dancing Script', sans-serif;
			font-size: 1em;
		}
		.comments-col:nth-child(2){
			display: flex;
			align-items: center;
			justify-content: space-around;
			background: url(bday.jpg);
		}
		.comments-col:nth-child(2) .para p{
			text-align: justify;
		}
		textarea{
			resize: none;
		}
		.preview{
			display: block;
			border: none;
			margin-top: 0;
		}
		@media (max-width: 700px){
			.card{
				width: 200px!important;
				height: 500px;
			}
			.imgbox h1{
				padding-top: 200px;
				font-size: 25px;
			}
			.para p{
				margin: .75em;
				font-size: .85em;
				line-height: 1.5em;
			}
			.imgbox p:nth-child(2){
				display:block;
			}
			.pc{
				display: none;
			}
		}
	</style>
	<body>
	<div class="row">
		<div class="comments-col" style="text-align: left;">
			<h3 style="text-align: left;color: var(--primary-color);"></h3>
			<form enctype="multipart/form-data" action="" method="post">
				<input type="text" name="username" value="" id="edValue" placeholder="Your Name" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" required>
				<input type="text" name="hbd_name" value="" placeholder="Birthday Boy/Girl Name" required>
				<input type="password" name="password" value="" placeholder="Password" required>
				<textarea rows="10" name="greetings" id="textarea" placeholder="Leave your Greetings" required>
Hey,

“A wish for you on your birthday, whatever you ask may you receive, whatever you seek may you find, whatever you wish may it be fulfilled on your birthday and always. Happy birthday!

I will be there with you in your side whenever you seek me.

always.

Enjoy your Day. Stay Blessed and Happy. Keep Smiling :)</textarea>
				<input type="file" name="fileImg" id="fileImg">
				<!-- <div class="">
					<img src="uploads/nouser.jfif" id="" alt="Preview" style="width: 100%; height: 100%;">
				</div> -->
				<div class="container-comment">
					<div class="star-widget">
						<input type="radio" name="rate" id="rate-5" value=5>
						<label for="rate-5" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-4" value=4>
						<label for="rate-4" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-3" value=3>
						<label for="rate-3" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-2" value=2>
						<label for="rate-2" class="fas fa-star"></label>
						<input type="radio" name="rate" id="rate-1" value=1>
						<label for="rate-1" class="fas fa-star"></label>
					</div>
				</div>
				<button type="submit" name="submit" class="hero-btn red-btn" style="color: var(--primary-color);border: 1px solid var(--primary-color);" id="contact-btn">Submit</button>
			</form>
		</div>
		<div class="comments-col">
			<div class='card' id='card'>
				<div class='imgbox'>
					<h1>Happy<br> Birthday!</h1>
					<p class='mobile'>Click me!</p>
					<p class='pc'>Hover me!</p>
					<img src="../school/uploads/nouser.jfif" class="preview" id="img">
				</div>
				<div class='details'>
					<div class='content'>
						<div class='para'>
							<p id="display"></p>
							<center><h4 style="margin-top: 1em;">from</h4></center>
							<p id="lblValue" class="signed"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../school/jquery.min.js"></script>
<script type="text/javascript"> 
var name = document.getElementById("name");

var comment = document.getElementById("textarea");
var display = document.getElementById("display");

display.innerHTML = comment.value;

function edValueKeyPress() {
    var edValue = document.getElementById("edValue");
    var s = edValue.value;

    var lblValue = document.getElementById("lblValue");
    lblValue.innerText = s;   
}

name.onkeyup = name.onkeypress = function() {
	var name = document.getElementById("name");
	var name_value = name.value;

	var signed = document.getElementById("signed");
	signed.innerHTML = name_value;
}
comment.onkeyup = comment.onkeypress = function() {
    document.getElementById('display').innerHTML = this.value;
}

	fileImg.onchange = evt => {
		const [file] = fileImg.files;
		if(file) {
			img.src = URL.createObjectURL(file);
		}
	}

	function submitData(){
		$(document).ready(function(){
			var formData = new FormData();
			var files = $('#fileImg')[0].files;
			formData.append('fileImg', files[0]);

			$.ajax({
				url: 'comment.php',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success:function(response){
					if(response == "Success"){
						alert("Successfully Added");
					}
					else if(response == "Invalid"){
						alert("Invalid Extension!");
					}
					else{
						alert("Successfully");
					}
				}
			});
		});
	}

	let modelBox = document.getElementById('modalBox');
	let ModalBoxContainer = document.getElementById('ModalBoxContainer');

	function closeBox(){
		modelBox.style.display="none";
		ModalBoxContainer.style.display="none";
	}
	function showbox(){
		modelBox.style.display="block";
		ModalBoxContainer.style.display="block";
	}
</script>
</body>
</html>