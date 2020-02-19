<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['adminlog'])) {
	header('Location: index.html');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// $stmt = $con->prepare('SELECT admin_id, admin_role, admin_pass FROM admins');
// // In this case we can use the account ID to get the account info.
// $stmt->execute();
// $stmt->bind_result($admin_id, $admin_role, $admin_pass);
// $stmt->fetch();
// $stmt->close();

// $stmt = $con->prepare('SELECT id, username, natid FROM users');
// $stmt->execute();
// $stmt->bind_result($id, $username, $natid);
// $stmt->fetch();
// $stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>ELECTRA | Transparent, Honest</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel='icon' href='../favicon.ico' type='image/x-icon'/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>ELECTRA | Admin</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home</h2>
			<p>Welcome, <?=$_SESSION['name']?>!</p>
			<p>CONGRATULATIONS <?=$_SESSION['name']?>! You have successfully logged into the ELECTRA Administrator Subsystem. Here you can perform various administrative tasks, like validate candidature for applicants who have applied and many more. Go ahead and explore the various functions. Remember, with great power comes great resposibility</p> 
			<h2>Admin Dashboard</h2>
		</div>
		<div class="dashboard">
			<table>
				<tr><td><h5>Users</h5></td></tr>
				<tr><td><a href="users/index.php"><button type="button" class="btn btn-success">Manage Users</button></a></td></tr>
			</table>
			<table>
				<tr><td><h5>Applicants</h5></td></tr>
				<tr><td><a href="applicants/index.php"><button type="button" class="btn btn-primary">Manage Applicants</button></a></td></tr>
			</table>
			<table>
				<tr><td><h5>Admins</h5></td></tr>
				<tr><td><a href="admins/index.php"><button type="button" class="btn btn-danger">Manage Admins</button></a></td></tr>
			</table>
		</div>
		<script src="js/bootstrap.js"></script>
 		 <script src="js/bootstrap.min.js"></script>
	</body>
</html>