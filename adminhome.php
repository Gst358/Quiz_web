<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<div style="display:flex;hieght: 100vh;width: 100%;overflow:hidden;
	        justify-content:center;align-items:center;">
			<video autoplay muted loop id="myVideo" style="position:absolute;top:0;left:0;object-fit:cover;Height: 100%;width: 100%;pointer-events:none;">
  <source src="2.mp4" type="video/mp4">
</video>
			<div style="position:relative;z-index: 1;padding-top:120px;>
		<header>
			<div class="container" style="border-bottom: 3px blue solid;">
				<h1 style="color:#fff;text-shadow: 4px 4px 10px red;">Admin Panel</h1>
				<a href="index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="exit.php" class="start">Logout</a>

			</div>
			<h1 style="color:white;">Welcome Admin</h1>
			
		</header>
		
		<main>
			<div class="container">
				<h2 style="color:white;">Welcome back, Admin</h2>
				</div>
				</main>
			</div>
		</div>
				</body>
				</html>

				<?php } 
				else {
				header("location: admin.php");
				}
				?>