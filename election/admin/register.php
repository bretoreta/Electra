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
		<div class="contentreg">
			<h1>Register</h1>
				<form action="regauth.php" method="post">
					<div class="form-group">
    					<label for="admin_name">Username:</label>
   							 <input type="text" name="admin_name" class="form-control" placeholder="Enter your username" id="admin_name" required>
 					</div>
 					<div class="form-group">
 						<label for="admin_role">Role:</label>
 							<input type="text" name="admin_role" class="form-control" placeholder="Enter Role" id="admin_role" required>
 					</div>
 					<div class="form-group">
   						<label for="admin_pass">Password:</label>
   							 <input type="password" name="admin_pass" class="form-control" placeholder="Enter your password" id="admin_pass" required>
  					</div>
   							<button type="submit" class="btn btn-outline-success">Register</button>
				</form>
				<hr width="75%">
					<a href="index.html"><button type="submit" class="btn btn-outline-success"><-Go Back</button></a>
		</div>
	</body>
	<script src="js/bootstrap.js"></script>
 		 <script src="js/bootstrap.min.js"></script>
</html>