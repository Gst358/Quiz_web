<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}


?>



<html>
	<head>
		<title>QUIZ</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<div  style="display:flex;hieght: 100vh;width: 100%;overflow:hidden;
	        justify-content:center;align-items:center;" >
			<video autoplay muted loop id="myVideo" style="position:absolute;top:0;left:0;object-fit:cover;Height: 100%;width: 100%;pointer-events:none;">
  <source src="2.mp4" type="video/mp4">
</video>
			<div   style="position:relative;z-index: 1;padding-top:120px;">
		<header>
			<div class="container">
				<h1  style="text-shadow: 4px 4px 10px red;">Admin Panel</h1>
				<a href="index.php" class="start">Home</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2  style="text-shadow: 4px 4px 10px blue;">Enter Password</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" >
				<input type="submit" name="submit" value="send"> 

			</div>


		</main>

		<footer>
			<div class="container"  style="text-shadow: 4px 4px 10px red;">
				Enjoy Learning
			</div>
		</footer>
	</div>	
	</div>

	</body>
</html>