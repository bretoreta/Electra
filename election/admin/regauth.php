<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'phplogin');

$username = $_POST['admin_name'];
$role = $_POST['admin_role'];
$password =password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);

$s = "SELECT * FROM admins WHERE admin_name = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
	 echo "<script type='text/javascript'>
                window.alert('Admin name already exist!');
                window.history.back();
            </script>";
}
else
{
	$reg= "INSERT INTO admins(admin_name, admin_role, admin_pass) VALUES ('$username' , '$role' , '$password')";
	mysqli_query($con, $reg);
	header('Location: index.html');
}
$reg->close();
?>