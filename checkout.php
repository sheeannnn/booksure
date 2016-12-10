<?php

	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	
	
$owner = $_SESSION['id'];
$results = mysqli_query($con,"select * from orderline where ownerid=".$owner);

mysqli_query($con,"insert into orderreceipt(ownerid) values ('".$owner."')");

while($rows = mysqli_fetch_array($results)){
	$asd = mysqli_query($con,"select * from orderreceipt order by id desc");
	$tambok = mysqli_fetch_array($asd);
	$shit = $tambok['id'];


	mysqli_query($con,"insert into history(ownerid,orderproduct,booktitle,orderprice,quantity,datetime,order_receipt)
	values ('". $rows['ownerid']."', '".$rows['orderproduct']."', '".$rows['booktitle']."', '".$rows['orderprice']."','". $rows['quantity']."',NOW(),'".$shit."')");
}

mysqli_query($con,"select * from orderline");
mysqli_query($con,"DELETE from orderline where ownerid =". $owner);

header('location: shoppingcart.php');

?>