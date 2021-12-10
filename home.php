<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<div  style="display:flex;hieght: 100vh;width: 100%;overflow:hidden;
	        justify-content:center;align-items:center;" >
		<video autoplay muted loop id="myVideo" style="position:absolute;top:0;left:0;object-fit:cover;Height: 100%;width: 100%;pointer-events:none;">
  <source src="1.mp4" type="video/mp4">
</video>
      <div style="position:relative;z-index: 1;padding-top:120px;">
		<header  style="background:">
		<header>
			<div class="container">
				<h1 style="text-shadow: 4px 4px 10px blue;">Let's Get Stated</h1>
			</div>
		</header>

		<main>
			<div class="container">
				<h2 style="text-shadow: 4px 4px 10px red;">Welcome!</h2>
				<p>This is just a simple quiz to test your knowledge!</p>
				<ul>
				    <li><strong>Number of questions: </strong><?php echo $total; ?></li>
				    <li><strong>Type: </strong>Multiple Choice</li>
				    <li><strong>Estimated time for each question: </strong><?php echo $total * 0.05 * 60; ?> seconds</li>
				    <li><strong>Score: </strong>   &nbsp; +1 point for each correct answer</li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quiz</a>
				<a href="exit.php" class="add">Exit</a>

			</div>
		</main>

		<footer>
			<div class="container" style="text-shadow: 4px 4px 10px red;">
				Enjoy Learning
			</div>
		</footer>
		</div>
		</div>

	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>