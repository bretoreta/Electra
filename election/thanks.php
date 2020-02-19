<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'phplogin');

$id = $_SESSION['id'];
$votestatus = "Voted";

$s = "UPDATE accounts SET votestatus = '$votestatus' WHERE id = '$id'";

$result = mysqli_query($con, $s);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>ELECTRA | Transparent, Honest</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel='icon' href='favicon.ico' type='image/x-icon'/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>ELECTRA | System</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Thanks For Voting!</h2>
			<a href="home.php"><button type="button" name="return" class="btn btn-outline-success"><-Go Back</button></a>
			<p>Well done, <?=$_SESSION['name']?>!, You have successfully cast your vote into the ballot box. Just like that! Wasn't hard was it? From us here at ELECTRA we would like to thank you for taking your time to vote. We wish you and your candidate of choice the very best of luck.</p> 
			<p>And now that you have voted, you can log out and take a rest, let ELECTRA take control and do the rest... Or you could explore the system. Feel free to do anything you like but remember you can only <strong>VOTE ONCE.</strong></p>
			<a href="logout.php"><button type="button" name="vote" class="btn btn-outline-success">Log Out</button></a>
		</div>
	</body>
</html>