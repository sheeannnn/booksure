<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
		header("location:index.php");
	}else if($_SESSION["status"]!=2){
		header("LOCATION: adminhome.php");
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
					

<div id="content-wrapper">
	<!--text-->
	<div style="text-align:center;color:black;font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;font-size:45px;">
	Welcome to Book Sure  </div>
	
	<div style="margin-top:3px;text-align:center;font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;font-size:20px;">
	A book is a device to ignite your imagination. Ride up your imagination. Choose your book.</div>
	<div style="margin-top:3px;text-align:center;font-size:20px;"><i>
				<?php
				$str = "'It is what you read when you don't have to that determines";
				echo htmlspecialchars($str);
				?>
	</i>
	</div>
	<div style="margin-top:3px;text-align:center;font-size:20px;"><i>
				<?php
				$str = "what you will be when you can't help it. -Oscar Wilde'";
				echo htmlspecialchars($str);
				?>
	</i>
	</div>
		<!-- end text-->
	
	<div style="margin-top:20px;margin-bottom:20px;">

	
		<div id="slider">
			<figure>
				<?php
					$query = "SELECT * from category_images";
					$result = mysqli_query($con,$query);
					
					while($img=mysqli_fetch_array($result)){
						
					echo("<img src='cat_img/" .$img['id'].".jpg"."'>");
					echo("</img>");
					}
				?>
			
			</figure>
		</div>
	</div>
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
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type = "text/javascript" language = "javascript"> 
function refresh_cart(){ 
$.post( "cart.php", { id: 2  }, 
function(data) { $('#melet').html("" +data); } ); } 

setInterval(function(){ refresh_cart() }, 100); 

</script>
	
	