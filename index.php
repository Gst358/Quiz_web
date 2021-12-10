<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO users(email,played_on) VALUES ('$email','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM users WHERE email = '$email' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}



?>
<html>
	<head>
		<title style=" 
        color: #111;
        background: #39ff14;
        box-shadow: 0 0 50px #39ff14;">QUIZ</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
			
	<body>
			<div style="display:flex;hieght: 100vh;width: 100%;overflow:hidden;
	        justify-content:center;align-items:center;" >
		<video autoplay muted loop id="myVideo" style="position:absolute;top:0;left:0;object-fit:cover;Height: 100%;width: 100%;pointer-events:none;">
  <source src="1.mp4" type="video/mp4">
</video>
			
		<div class="body" style="position:relative;z-index: 1;padding-top:120px;">
		<header  style="background:">
			<div class="container" >
				<h1 style="background-color:color:#3a0ca3; #03045e;text-shadow: 4px 4px 10px blue;
        ">QUIZ</h1>
				<a href="index.php" class="start" >Home</a>
				<a href="admin.php" class="start">Admin Panel</a>

			</div>
		</header>

		<main style="background:">
		<div class="container">
				<h2 style="text-shadow: 4px 4px 10px red;">Enter Your Email</h2>
				<form method="POST" action="">
				<input type="email" name="email" required="" >
				<input type="submit" name="submit" value="Enter">

			</div>


		</main>

		<footer style="background:;height: 100px;">
			<div class="container" style="text-shadow: 4px 4px 10px red;">
				Enjoy Learning
			</div>
		</footer>
		</div>
         </div>

	</body>
	
</html>