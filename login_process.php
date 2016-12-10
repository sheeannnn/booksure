

<?php

require_once('connection/dbMain.php');
if(!(isset($_SESSION["username"]))){

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con,"select * from userprofile where username='" . $username . "' and password='". $password . "'");
$row = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);
//
if($num_rows>0)
{


$_SESSION['username']=$row['username'];
$_SESSION['fullname']=$row['fname'];
$_SESSION['id']=$row['id'];
$_SESSION['status'] = $row['status'];
	if($row["status"]==2){
		header('location: controller.php?home');
	}else if($row["status"]==1){
		header('location: staffhome.php');
	}
	else{
		header("LOCATION: adminhome.php");	
	}
}

else
{
	header('location: login.php');
}
}
?>





























