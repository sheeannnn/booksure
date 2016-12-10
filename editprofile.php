<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	
	
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


 <script src="http://tristanedwards.me/u/SweetAlert//lib/sweet-alert.js"></script>
 <link rel="stylesheet" type="text/css" href="http://tristanedwards.me/u/SweetAlert//lib/sweet-alert.css">
 <style>
 @import url(http://fonts.googleapis.com/css?family=Merriweather:300,700);
@import url(http://fonts.googleapis.com/css?family=Merriweather+Sans:300,700);
 </style>
 

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
	<div id="title">Edit Profile &nbsp;
	<img src="imgs/edit.png" alt="Smiley face" height="50" width="50"></img>
	</div>
	
	<div style="margin-left:100px;">
	<form name="myForm" action="editprocess.php" method="post">

		<table >
				<tr>
					<input type="hidden" name="id" value="<?php echo($row['id']);?>"></input>
					<td> <input type="text" name="fname" disabled="disable" value="<?php echo($row['fname']); ?>" class="field"> </td>
					<td>  <input  type="text" name="lname" disabled="disable" value="<?php echo($row['lname']); ?>" class="field"> </td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td> <input  type="text" name="home_add" placeholder="<?php echo($row['home_add']); ?>" class="field">  </td>
					<td> <input type="text"  name="email" placeholder="<?php echo($row['email']); ?>" class="field"> </td>
				</tr>
				<tr>
					<td> <input  type="text" name="con_num"  placeholder="<?php echo($row['con_num']); ?>" class="field">  </td>
				</tr>
		</table>
		<br>
		<br>
		<br>
		<table>
				<tr>
					<td> <input  type="text" name="username"  placeholder="New Username" class="field">  </td>
					<td> <input  type="password" name="password"  placeholder="New Password" class="field">  </td>
				</tr>
		</table>
		<br>
		<table>
	
				<tr>
					<td><input  id="hello" style="width:265px;" class="low" type="submit" value="Update Profile"></td>
				</tr>
				
		</table>	

		
	</form>
	</div>	
</div>
<!--end body-->	
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