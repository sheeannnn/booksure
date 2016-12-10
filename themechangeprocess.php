<?php
	include_once("connection/dbMain.php");
	header('location: adminhome.php');
		
	$newtheme = $_GET['theme']; 
	$id = $_SESSION['id']; 
	mysqli_query($con,"select * from userprofile");
	mysqli_query($con,"update userprofile set bg_style = '".$newtheme."' where id=" . $id);




?>