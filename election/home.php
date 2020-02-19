<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
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
 			<!-- <div class="alert alert-success alert-dismissible fade show">
   				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				 <strong>Success!</strong> Your submission has been sucessful!
			</div> -->
		<div class="content">
			<h2>Home</h2>
			<p>Welcome, <?=$_SESSION['name']?>!</p>
			<p>CONGRATULATIONS <?=$_SESSION['name']?>! You have successfully logged into the ELECTRA System. You have the privilege to vote for your favorite candidate. The Candidates listed are as per the vetting session carried out by the Vetting Committee. If you fail to identify your favorite candidate s/he possibly failed the vetting process.
			Happy Voting!<br>
			<br>
			<strong><i>Administrator</i></strong></p> 
		   <h5>Choose what to do</h5>
				<div class="actions">
					<a href="votingsystem/index.php"><button type="button" class="btn btn-outline-success">Proceed to Vote</button></a>
					<a href="votingsystem/result.php?id=1"><button type="button" class="btn btn-outline-success">Election Progress</button></a>
					<a href="candidatereg.php"><button type="button" class="btn btn-outline-success">Apply As A Candidate</button></a>
				</div>
		</div>
	</body>
</html>