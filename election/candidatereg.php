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
		<div class="content">
			<h2>Register As A Candidate</h2>
			<a href="home.php"><button type="button" class="btn btn-outline-success"><-Go Back</button></a>
			<p>Hello, <?=$_SESSION['name']?>! You are now applying as a candidate for the electoral process. Please note that your application will be submitted to the admin and the vetting board for scrutiny. Registering as a candidate does not gurantee your appearance in the voting screen. Please fill in the form below before submitting your application. Cross-check your informationbefore submission to ensure you are giving the right information. We are always here to help, incase of any difficulty you can contact the Administrator.</p> 
			 <form action="candregauth.php" method="post">
  					<div class="form-group">
    					<label for="appost">Post Applying For:</label>
   							 <input type="text" name="apppost" class="form-control" placeholder="Enter post applying for" id="apppost" required>
 					 </div>
 					 <div class="form-group">
   						 <label for="appbio">Biography:</label>
   							 <textarea type="textarea" name="appbio" class="form-control" placeholder="Tell us about you" id="appbio" required></textarea>
  						</div>
   <button type="submit" class="btn btn-success">Submit</button>
</form> 
		</div>
	</body>
</html>