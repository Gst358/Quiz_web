<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
		<title>RESULT PAGE</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body style="background:black;">
		
		<header>
			<div class="container">
				<h1  style="text-shadow: 4px 4px 10px red;" >RESULT</h1>
			</div>
		</header>

		<main>
			<div class= "container">
			<h2>Congratulations!</h2> 
				<p>You have successfully completed the test</p>
				<p>Total points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<BUtton   STYLE=" outline: 0;
    position: relative;
    display: inline-block;
    padding: 10px 40px;
    font-size: 20px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #FFFF00;
    background: #FFFF00;
    color: #000;
    font-weight: 600;
    transition: box-shadow 0.5s ease-in-out, border-color 0.5s ease-in-out;
} "><a href="question.php?n=1" class="start">Start Again</a></BUtton>
<BUtton STYLE=" outline: 0;
    position: relative;
    display: inline-block;
    padding: 10px 40px;
    font-size: 20px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #FFFF00;
    background: #FFFF00;
    color: #000;
    font-weight: 600;
    transition: box-shadow 0.5s ease-in-out, border-color 0.5s ease-in-out;
}"><a href="home.php" class="start">Go Home</a></BUtton>
		<!-- <a href="home.php" class="start">Go Home</a> -->
		</div>
		</main>
		
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

