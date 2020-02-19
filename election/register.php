<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>ELECTRA | Register</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel='icon' href='favicon.ico' type='image/x-icon'/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Registration Form</h1>
			<form action="regauth.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="natid">
					<i class="fas fa-user-cog"></i>
				</label>
				<input type="text" name="natid" placeholder="Enter ID No" id="natid" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Register">
				<p>Already a member? You can</p>
			</form>
			<div class="register">
				<a href="index.html"><input type="button" value="Login"></a>
			</form>
		</div>
	</body>
</html>