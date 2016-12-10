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
										 <a href="themechangeprocess.php?theme=green">Green</a>
										 <a href="themechangeprocess.php?theme=blue">Blue</a>
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
	<!--text-->
	<div id="title">Edit Staff Profile</div>
		
	
		<?php
			$id = $_GET['id'];
			$result = mysqli_query($con,"select * from userprofile where id=".$id);
			while($row=mysqli_fetch_array($result))
			{
			?>
			<form name="edit_admin" method="post" action="editadminprocess.php">
					<input type="hidden" name="id" value="<?php echo($row['id']);?>"></input>

				<table>
					<tr>
						<td>First Name:</td>
						<td><input class="field" type="text" name="fname" value="<?php echo($row['fname']); ?>" /></td>
					</tr>
					<tr>
					<tr>
						<td>Last Name:</td>
						<td><input class="field" type="text" name="lname" value="<?php echo($row['lname']); ?>" /></td>
					</tr>
					<tr>
						<td>Contact Number:</td>
						<td><input class="field" type="text" name="con_num" value="<?php echo($row['con_num']); ?>" /></td>
					</tr>
					<tr>
						<td>Home Address:</td>
						<td><input class="field" type="text" name="home_add" value="<?php echo($row['home_add']); ?>" /></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><input class="field" type="text" name="email" value="<?php echo($row['email']); ?>" /></td>
					</tr>
						<td>Username:</td>
						<td><input class="field" type="text" name="username" value="<?php echo($row['username']); ?>"  /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input class="field" type="password" name="password" value="<?php echo($row['password']); ?>"  /></td>
					</tr>
					<tr>
						<td><input id="lol1" type="submit" value="Save" name="edit" /></td>
						<td><input id="lol1" type="submit" value="Delete" name="delete" /></td>
					</tr>
				</table>
			</div>
			</form>
			<?php
			}
			?>
	
	<!-- end text-->
	

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

	
						