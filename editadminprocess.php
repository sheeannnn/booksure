<html>
<head>
<script src="js/sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style/sweetalert.css"></link>

</head>
</html>	

<?php
	include_once("connection/dbMain.php");
	if(isset($_POST['edit'])){
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$con_num = $_POST['con_num'];
			$home_add = $_POST['home_add'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			mysqli_query($con,"select * from userprofile");
			mysqli_query($con,"update userprofile set fname = '".$fname."', lname = '".$lname."', con_num = '".$con_num."', home_add = '".$home_add."', email = '".$email."', username = '".$username."', password = '".$password."' where id=".$id);
			
	}
	else if(isset($_POST['delete'])){
			$id = $_POST['id'];
			mysqli_query($con,"select * from userprofile");
			mysqli_query($con,"delete from userprofile where id =". $id) or die(mysql_error());
	}
	
	echo ("<script>swal(
							{title: 'Staff Profile Updated.',},function(){window.location.href = 'staff.php';});
							</script>");
?>