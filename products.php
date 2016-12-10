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
	<form name="myform" method="post" action="productprofile.php">
	<?php
	if(empty($_POST['productspage'])){header('location:home.php');}
	else if (!isset($_POST['productspage'])){header('location:home.php');}
	else{
	$productspage= $_POST['productspage'];}
			
			if(!isset($productspage)){header('location:home.php');}
			$query= "SELECT * FROM product_category where id=".$productspage;
			$product_cat_set = mysqli_query($con,$query);
			
			while($product_cat = mysqli_fetch_array($product_cat_set)){
	
			
				echo ("<div class='prod-cat-header'>");
				echo ($product_cat['cat_name']);
				
				echo("</div>");
				
		
				$query="SELECT * from products where category_id=".$product_cat['id'];
				$product_set=mysqli_query($con,$query);
				
				while($products=mysqli_fetch_array($product_set)){
					
					$result=mysqli_query($con,"SELECT prod_id from product_images where prod_id=". $products['id']);
					
					echo("<div class='products'>");
							while($a = mysqli_fetch_array($result)){
								echo("<input type='image' value='$products[id]' name='productsfile' class='prodthumb' src='img/" .$a['prod_id'].".jpg"."'>");
								echo("</input>");
								echo("<p id='names'>".$products['title']."</p>");
								echo("<p id='names'>"."By ". $products['author']."</p>");
								echo("<p id='names'>"."Php ". $products['price'] .".00 "."</p>");
								
								
							}
					echo("</div>");
				
			}
		}
	
			
	?>
	</form>
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