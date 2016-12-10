<?php

	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	
$orderid = $_GET['id'];

mysqli_query($con,"delete from orderline where id=" . $orderid);


header('location: shoppingcart.php');

?>