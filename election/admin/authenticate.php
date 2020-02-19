<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['admin_name'], $_POST['admin_pass']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}
if ($stmt = $con->prepare('SELECT admin_id, admin_pass FROM admins WHERE admin_name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['admin_name']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($admin_id, $admin_pass);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['admin_pass'], $admin_pass)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['adminlog'] = TRUE;
		$_SESSION['name'] = $_POST['admin_name'];
		$_SESSION['id'] = $admin_id;
		header('Location: home.php');	
} 
else 
{
	   echo "<script type='text/javascript'>
                window.alert('Incorrect Password!');
                window.history.back();
            </script>";
	}
} 
else 
{
	 echo "<script type='text/javascript'>
                window.alert('Incorrect Username!');
                window.history.back();
            </script>";
}

	$stmt->close();
}
?>