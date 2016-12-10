<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
		header("location:index.php");
	}else if($_SESSION["status"]!=2){
		header("LOCATION: adminhome.php");
	}
	
	
	$user=$_SESSION['username'];
	$userid=$_SESSION['id'];
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
								<li><a href="shoppingcart.php">Shopping Cart(<b id="melet"></b>)</a></li>
								<li class="dropdown"><a href="#">
									<?php echo($row['fname']); ?>
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
					
<!--body starts-->
<div id="content-wrapper">
	<h1>ORDER HISTORY</h1>
	<br>
	<center>
	<table>
	<?php
	
		$query="SELECT * from orderreceipt where ownerid='$userid'";
		$results=mysqli_query($con,$query);
		
		while($rows=mysqli_fetch_array($results)){
			echo("<th>Order Number</th>");
			echo("<th>Book Title</th>");
			echo("<th>Price</th>");
			echo("<th>Quantity</th>");
			echo("<th>Total Price</th>");
			
					
			
			
				$query="SELECT * from history where order_receipt='$rows[id]'";
				$result=mysqli_query($con,$query);
				$totalprice=0;
				$grandprice=0;
				
			
				while($row=mysqli_fetch_array($result)){
					$totalprice = (($row['orderprice']) * ($row['quantity']));
					$grandprice += $totalprice;
					
				echo ("<tr>");
					echo ("<td>" . $rows['id']. "</td>");
					echo ("<td>" . $row['booktitle']. "</td>");
					echo ("<td> Php " . $row['orderprice']. ".00 </td>");
					echo ("<td>" . $row['quantity']. "</td>");
					echo ("<td> Php " . $totalprice. ".00</td>");
				echo("</tr>");
				}
				
				echo("<tr><td><b>Total Grand Price: </td>");
			
				echo ("<td colspan='6' style='text-align:right;'><b> Php " . $grandprice. ".00 </b></td>");
				echo("</tr>");
			
				
		}
			
	?>
		
	</table>
	</center>
			
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
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type = "text/javascript" language = "javascript"> 
function refresh_cart(){ 
$.post( "cart.php", { id: 2  }, 
function(data) { $('#melet').html("" +data); } ); } 

setInterval(function(){ refresh_cart() }, 100); 

</script>