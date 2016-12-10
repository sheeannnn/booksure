<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
		header("location:index.php");
	}else if($_SESSION["status"]!=2){
		header("LOCATION: adminhome.php");
	}
	
	
	$userid = $_SESSION['id'];
$user=$_SESSION['username'];
	$query = "SELECT * FROM userprofile WHERE username='$user'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	

	
?>

<html>
<head>
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style/<?php $results = mysqli_query($con,"select * from userprofile where id='21'");
		
$rows = mysqli_fetch_array($results);echo($rows['bg_style']); ?>.css" />

</head>

<body>
		<div id="wrapper">
				<div id="header"> 	<!-- start of header section -->
					<div id="header-wrapper">
					
						<div id="logo"><!-- logo -->
							<img src="imgs/booksure.png" height="150" width="200"></img>
						</div>
					
						<div id="panel">
							<ul>
					
								<li><a href="home.php">Home</a></li>
								<li class="dropdown"><a href="#home">Products</a>
									<div class="dropdown-content">
										<a href="categories.php">Categories</a>
										<a href="latestrelease.php">Latest Release</a>
									</div>	
								</li>	
								<li class="dropdown"><a href="aboutus.php">About us</a>
									<div class="dropdown-content">
										 <a href="aboutus.php">Contact Us</a>
										 <a href="faqs.php">FAQs</a>
								</div>
								</li>		
								<li><a href="shoppingcart.php">Shopping Cart</a></li>
								<li class="dropdown"><a href="#">
									<?php  echo($row['fname']); ?>
									</a>
									<div class="dropdown-content">
									  <a href="edit.php">Account Settings</a>
									  <a href="orderhistory.php">Order History</a>
									  <a href="controller.php?logout">Log out</a>
									</div>
								</li>
							</ul>
						</div>
	
					</div>
					
					
						
				</div><!-- end of header section -->
					
<div id="content-wrapper">
	<h1>SHOPPING CART</h1>
	<br>
	<center>
	<table>
			<th>Book Title</th>
			<th>Book Price</th>
			<th>Quantity</th>
			<th>Date of Purchase</th>
			<th colspan='2'>Options</th>
	
	<?php
	

		$query="SELECT * from orderline where ownerid='$userid'";
		$result=mysqli_query($con,$query);
		$totalprice=0;
		
		while($row=mysqli_fetch_array($result)){
	?>		<form name="myform" action="editquantityprocess.php?id=<?php echo($row['id']);?>" method="POST">
			<tr id="yow">
			<td><?php echo($row['booktitle']);?></td>
			<td><?php echo("Php ".$row['orderprice'].".00");?></td>
			<td><input type="text" name="quantity" value="<?php echo($row['quantity']); ?>"  /></td>
			<td><?php echo($row['datetime']);?></td>
			
			<?php $totalprice = $totalprice + (($row['orderprice']) * ($row['quantity'])); ?>
			
			<td ><button id="lol1" onclick="window.location.href='deleteprocess.php?id=<?php echo($row['id']);?>'">Cancel order</a></td>
			<td ><button type="submit" id="lol1" >Edit Quantity</a></td>
			</tr>
			</form>
	<?php
	}
	?>
	
	<table style="font-size:30px;">
		

			<tr id="yow">
			<td style='font-size:30px;'>Total Price</td>
			<td style='font-size:30px;'><?php echo("Php ".$totalprice.".00");?></td>
			<td style='font-size:30px;'><button id="lol1" onclick="window.location.href='checkout.php?id=<?php echo($row['ownerid']);?>'">Checkout</button></td>
			<td style='font-size:30px;'><button id="lol1" onclick="window.location.href='empty.php?id=<?php echo($row['ownerid']);?>'">Empty Cart</a></td>
			</tr>
	
	</table>
	</form>
</div>

<div id="footer"> 	<!-- footer ni dhai -->
					<div id="footer-wrapper">
					
					<p style="color:white;font:rtifont-size:20px;">Copyright 2016.<a href="index.php" style="color:white;text-decoration:none;"> Book Sure.</a> All rights Reserved.</p>
					<a class="imgh" href="#"><img src="imgs/fb.png" style="width:50px;height:50px;position:relative;margin-top:-10px;margin-left:40px;">
					</img>
					<a class="imgh" href="#"><img src="imgs/twitter.png" style="width:50px;height:50px;position:relative;margin-top:-10px;">
					</img>
					<a class="imgh" href="#"><img class="imgh" src="imgs/ig.png" style="width:50px;height:50px;position:relative;margin-top:-10px;">
					</img>	
					</div>
					
</div>	<!-- end sa footer dhai -->	