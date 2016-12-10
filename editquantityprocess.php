<?php

	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	else{
$orderid = $_GET['id'];
$quantity = $_POST['quantity'];

mysqli_query($con,"select * from orderline");
mysqli_query($con,"update orderline set quantity=".$quantity." where id=" . $orderid);

mysqli_query($con,"select * from history");
mysqli_query($con,"update history set quantity=".$quantity." where id=" . $orderid);

header('location:shoppingcart.php');
	}

?>