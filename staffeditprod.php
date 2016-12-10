<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
		header("location:index.php");
	}else if($_SESSION["status"]==2){
		header("LOCATION: home.php");
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
					
							
								<li class="dropdown"><a href="#home">Category Settings</a>
									<div class="dropdown-content">
										<a href="staffaddcat.php">Add Category</a>
										<a href="staffeditcat.php">Edit/Delete Category</a>
									</div>	
								</li>	
								<li class="dropdown"><a href="#home">Product Settings</a>
									<div class="dropdown-content">
										<a href="staffaddprod.php">Add Product</a>
										<a href="staffeditprod.php">Edit/Delete Product</a>
									</div>	
								</li>									
								<li class="dropdown"><a href="#">
									<?php echo($row['fname']); ?>
									</a>
									<div class="dropdown-content">
									  <a href="staffedit.php">Account Settings</a>
									  <a href="controller.php?logout">Log out</a>
									</div>
								</li>
							</ul>
						</div>
	
					</div>
					
					
						
				</div><!-- end of header section -->
<div id="content-wrapper">
	


	<div id="title">All Products</div>
	
	
		
		<?php
				$query="SELECT * from products";
				$product_set=mysqli_query($con,$query);
				
				while($products=mysqli_fetch_array($product_set)){
					
					$result=mysqli_query($con,"SELECT prod_id from product_images where prod_id=". $products['id']);
					
					echo("<div class='products'>");
							while($a = mysqli_fetch_array($result)){				
								echo("<img class='prodthumb' src='img/" .$a['prod_id'].".jpg"."'>");
								echo("</img>");
								echo("<p id='names'><a id='names' style='text-decoration:none;' href='staffeditprodprofile.php?shee=$a[prod_id]'>".$products['title']."</a></p>");
							}
		
					echo("</div>");
				}
		?>
			
			
			

	
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

	
						