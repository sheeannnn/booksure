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

	if(isset($_POST['addnewproduct'])){
	$name = $_POST['prod_name'];
	$description = $_POST['prod_desc'];
	$category = $_POST['prod_category'];
	$price = $_POST['prod_price'];
	$author = $_POST['prod_author'];

	mysqli_query($con,"select * from products");

	mysqli_query($con,"insert into products(title,description,price,category_id,author) values('". $name ."','". $description ."','".$price."','".$category."','".$author."')");
	$shee = mysqli_query($con,"select * from products order by id desc");
	$ann = mysqli_fetch_array($shee);
	$capitoc = $ann['id'];
	mysqli_query($con,"insert into product_images(name,prod_id,category_id) values('". $name ."','".$capitoc."','".$category."')");
	
				
				
				$imgID = mysqli_insert_id($con);
				$newname = "$imgID.jpg";
				move_uploaded_file($_FILES['fileField']['tmp_name'],"img/$newname");
				
			

			

	header('location: staffaddprod.php');}
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
	


	<div id="title">Add Product</div>
	
	
	<div id="forms"><!--login-->
			<form name="myForm" action="staffaddprod.php" method="post">
			<table>
				<tr>
					<td>Product Name:</td><td><input type="text" class="field" name="prod_name" placeholder="Product Name"></td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Description:</td>
					<td>
							<textarea name="prod_desc" class="textfield" cols="45" rows="10" placeholder="Product Description"></textarea>
					</td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Price:</td><td><input type="text"  class="field" name="prod_price" placeholder="Price"></td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Category Name:</td>
					<td>
						<select name="prod_category"class="field">
						<option value="">Select Category</option>
							<?php 
									$result = mysqli_query($con,"SELECT * FROM product_category");
									while($product_cat = mysqli_fetch_array($result)){
										echo ("<option value='$product_cat[id]'>". $product_cat['cat_name']."</option>"); 
									}
					
							?>
					
						</select>
					</td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Author:</td><td><input type="text" class="field" name="prod_author" placeholder="Author"></td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Image:</td><td><input type="file"  name="fileField"></td>
				</tr>
				
				
				
			</table>
		<br>
		<div>
			<table>
		<tr>
			<td><input type="submit" class="low3" name="addnewproduct" style="margin-left:300px;" value="Add Product"/></td>
		</tr>
	</table>
		</div>
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
<?php
	//Close connection
	mysqli_close($con);
?>
	
						