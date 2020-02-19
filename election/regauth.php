<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'phplogin');

$username = $_POST['username'];
$natid = $_POST['natid'];
$password =password_hash($_POST['password'], PASSWORD_DEFAULT);
$votestatus = "Not Voted";

$s = "SELECT * FROM accounts WHERE username = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Username already taken.";
}
else
{
	$reg= "INSERT INTO accounts(username, natid, password, votestatus) VALUES ('$username' , '$natid' , '$password' , '$votestatus')";
	mysqli_query($con, $reg);
	header('Location: index.html');
}
$reg->close();
?>