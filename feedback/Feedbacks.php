<!doctype html>
	<html>
		<head>
		  <title>Feedback</title>
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="js/jquery-3.3.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="Stylesheet.css">
		  <!-- app.css included after older sheets so it overrides colors -->
		  <link rel="stylesheet" href="../css/app.css">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
  
<body>
<?php
require_once('../connection.php');
session_start();
$email = $_SESSION['email'];

if(isset($_POST['submit'])){
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	$sql="insert into  feedback (EMAIL,COMMENT) values('$email','$comment')";
	$result = mysqli_query($con,$sql);
	echo '<script>alert("Feedback Sent Successfully!!THANK YOU!!")</script>';
	header("Location: ../cardetails.php");

	
}





?>


<div class="site-container">
	<a class="btn btn--ghost" href="../cardetails.php">Go To Home</a>

	<main class="card" style="margin-top:18px;">
		<h1 class="header">Feedback</h1>
		<div class="de">
			<div>
				<p class="muted">We appreciate your feedback — tell us what went well and where we can improve.</p>
			</div>
			<div>
				<form method="POST">
					<div class="field">
						<input type="text" name="name" class="form-control" placeholder="Your name" required />
						<input type="email" name="email" class="form-control" placeholder="Your email" required />
						<textarea class="form-control" name="comment" rows="6" placeholder="Message" required></textarea>
					</div>
					<div style="margin-top:12px; display:flex; gap:10px;">
						<input type="submit" class="btn btn--primary" id="btn" value="Submit" name="submit">
						<a class="btn btn--ghost" href="../cardetails.php">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</main>
</div>
	</body>
</html>
