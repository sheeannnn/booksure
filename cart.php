<?php 
require_once('connection/dbMain.php');

	$cart = 0;
	
//checked if logged in or not
if(isset($_SESSION['id'])){
	if($_REQUEST['id']){
		
	$cart_query = mysqli_query($con, "select quantity, count(*) from orderline where ownerid =" .$_SESSION['id']);
	while($row=mysqli_fetch_array($cart_query)){
		$cart += $row['count(*)'];
	}
	echo $cart;
	}
}else{
	echo $cart;
}

?>
