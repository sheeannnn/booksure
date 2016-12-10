<html>
<head>
<script src="js/sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style/sweetalert.css"></link>

</head>
</html>	



<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}

if(empty($_POST['email'])|| empty($_POST['home_add'])|| empty($_POST['con_num'])|| empty($_POST['username'])|| empty($_POST['password'])) 
{
	
			echo ("<script>swal(
							{title: 'Please Fill All the Fields.',},function(){window.location.href = 'editprofile.php';});
							</script>");
	die();

		
}

if(isset($_POST['email'])|| isset($_POST['home_add'])|| isset($_POST['con_num'])|| isset($_POST['username'])|| isset($_POST['password'])) 
{
$id = $_POST['id'];
$email = $_POST['email'];
$homeadd = $_POST['home_add'];
$contact = $_POST['con_num'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($con,"select * from userprofile");
mysqli_query($con,"update userprofile set con_num = '".$contact."', home_add = '".$homeadd."', email = '".$email."',username = '".$username."',password = '".$password."' where id=" . $id);

	echo ("<script>swal(
							{title: 'Profile Updated. Please Login to Continue',},function(){window.location.href = 'controller.php?logout';});
							</script>");

}

?>
