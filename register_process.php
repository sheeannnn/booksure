<html>
<head>
<script src="js/sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style/sweetalert.css"></link>

</head>
</html>	



<?php
	include_once("connection/dbMain.php");
	
if(empty($_POST['email'])|| empty($_POST['home_add'])|| empty($_POST['con_num'])|| empty($_POST['username'])|| empty($_POST['password'])) 
{
		
					echo ("<script>swal(
							{title: 'Please Fill All the Fields.',},function(){window.location.href = 'login.php';});
							</script>");
					die();
	
}

if(isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['email']) || isset($_POST['home_add']) || isset($_POST['con_num'])|| isset($_POST['username'])|| isset($_POST['password'])) 
{	
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['con_num'];
$homeadd = $_POST['home_add'];
$emailadd = $_POST['email'];

$username = $_POST['username'];
$password = $_POST['password'];


mysqli_query($con,"select * from userprofile");
mysqli_query($con,"insert into userprofile(fname,lname,con_num,home_add,email,username,password) values('". $fname ."','". $lname ."','". $contact ."','". $homeadd."','" . $emailadd . "','" . $username . "','" . $password . "')");


						echo ("<script>swal(
							{title: 'Registered Successfully. Please Login to Continue.',},function(){window.location.href = 'index.php';});
							</script>");
								
}

?>
