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
<link rel="stylesheet" type="text/css" href="style/<?php echo($row['bg_style']); ?>.css" />

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
										<a href="addcat.php">Add Category</a>
										<a href="editcat.php">Edit/Delete Category</a>
									
									</div>	
								</li>	
								<li class="dropdown"><a href="#home">Product Settings</a>
									<div class="dropdown-content">
										<a href="addprod.php">Add Product</a>
										<a href="editprod.php">Edit/Delete Product</a>
										
										
									</div>	
								</li>	
								<li class="dropdown"><a href="#">Themes</a>
									<div class="dropdown-content">
										 <a href="themechangeprocess.php?theme=style">Default</a>
										 <a href="themechangeprocess.php?theme=green">Green and White</a>
										 <a href="themechangeprocess.php?theme=blue">Blue and White</a>
								</div>
								</li>		
								
								<li class="dropdown"><a href="#">
									<?php echo($row['fname']); ?>
									</a>
									<div class="dropdown-content">
									  <a href="adminedit.php">Account Settings</a>
									  <a href="staff.php">User Settings</a>
									  <a href="controller.php?logout">Log out</a>
									</div>
								</li>
							</ul>
						</div>
	
					</div>
					
					
						
				</div><!-- end of header section -->
<div id="content-wrapper">
	


	<div id="title">Edit/ Delete Product</div>

	
		<div id="forms"><!--login-->
			<form  method="post" action="editprodprocess.php" enctype="multipart/form-data">
					<?php
						$id = $_GET['shee'];
						$result = mysqli_query($con,"select * from products where id=".$id);
						while($row=mysqli_fetch_array($result))
						{
					?>		
						<input type="hidden" name="id" value="<?php echo($row['id']);?>"></input>
						<table>
							<tr>
								<td>Product Name:</td><td><input type="text"  class="field" name="prod_name" value="<?php echo($row['title']); ?>"></input></td>
							</tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td>Product Description:</td>
								<td><textarea type="text" class="textfield" cols="45" rows="10" name="prod_desc"><?php echo($row['description']); ?></textarea></td>
							</tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td>Price:</td><td><input type="text"class="field" name="prod_price" value="<?php echo($row['price']); ?>"></input></td>
							</tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td>Category:</td>
								<td><select name="prod_category" style="height:60px;" class="field">
										 
											<?php 
													$result = mysqli_query($con,"SELECT * FROM product_category");
													while($product_cat = mysqli_fetch_array($result)){
														echo ("<option value='$product_cat[id]'>". $product_cat['cat_name']."</option>"); 
													}
									
											?>
									</select>
								</td>
							</tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td>Author:</td><td><input type="text" class="field" name="prod_author" value="<?php echo($row['author']); ?>"  /></td>
							</tr>
							<tr></tr><tr></tr><tr></tr>
							<tr>
								<td>Product Image:</td>
								<td><?php
										$result=mysqli_query($con,"select prod_id from product_images where id=".$id);
										echo("<div class='products'>");
											while($a = mysqli_fetch_array($result)){				
												echo("<img class='prodthumb' src='img/" .$a['prod_id'].".jpg"."'>");
												echo("</img>");
											}
										echo("</div>");	
									?>
							
								
								<input class="col_3 marginleft_3" type="file" name="fileField" />
								</td>
							</tr>
								<tr></tr><tr></tr><tr></tr>
								<tr></tr><tr></tr><tr></tr>
								<tr></tr><tr></tr><tr></tr>
								<tr></tr><tr></tr><tr></tr>
							<tr>
								
								<td><input type="submit" class="low3"value="Update Product" name="edit" /></td>
								<td><input type="submit" class="low3"value="Delete Product" name="delete" /></td>
							</tr>
							
					
						</table>	
							
						
					<?php	
						}	
					?>
			</form>
	</div>	
</div>	





	<!-- Login ends -->
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

	
						