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

		<div id="content">
			<br><center><h3>List of Staffs </h3></center><br>
				<table style="text-align:center">
					<thead>
						<tr id="fixed">
							
							<th style="font-size:20px;">First Name</th>
							<th style="font-size:20px;">Last Name</th>
							<th style="font-size:20px;">Contact Number</th>
							<th style="font-size:20px;">Home Address</th>
							<th style="font-size:20px;">E-mail</th>
							<th style="font-size:20px;">Username</th>
						</tr>
					</thead>
					<?php

					$result = mysqli_query($con,"select * from userprofile");
					while($row=mysqli_fetch_array($result)) 
					{ if($row['status'] == 1){
					?>
					<tr> 
						
						<td><?php echo($row['fname']); ?> </td>
						<td><?php echo($row['lname']); ?> </td>
						<td><?php echo($row['con_num']); ?> </td>
						<td><?php echo($row['home_add']); ?> </td>
						<td><?php echo($row['email']); ?> </td>
						<td><?php echo($row['username']); ?> </td>
						<td><button  id="lol1"onclick="window.location.href='edit_admin.php?id=<?php echo($row['id']);?>'"> Edit </button></td>
						
						
					</tr>

					<?php
				}
				}
				?>


				</table><br>
				<center>
					<button id="lol1" type="submit" value="Go" name="addstaff" Placeholder="Go" onClick="window.location.href='add_admin.php'"/>Add Staff</button>
				</center>
		</div>
	
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

	
						