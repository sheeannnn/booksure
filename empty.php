<?php

	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	

$orderid = $_GET['id'];
$owner = $_SESSION['id'];

mysqli_query($con,"select * from orderline");
mysqli_query($con,"DELETE from orderline where ownerid =". $owner);


header('location: shoppingcart.php');

?>