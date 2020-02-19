<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'phplogin');

$username = $_SESSION['name'];
$apppost = $_POST['apppost'];
$appbio =$_POST['appbio'];

$s = "SELECT * FROM appcandidates WHERE appcandname = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	
	   echo "<script type='text/javascript'>
                window.alert('You already registered as a candidate!');
                window.history.back();
            </script>";
}
else
{
	$reg= "INSERT INTO appcandidates(appcandname, apppost, appbio) VALUES ('$username' , '$apppost' , '$appbio')";
	mysqli_query($con, $reg);
	header('Location: home.php');
}
$reg->close();
?>