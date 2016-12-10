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
	
			if(isset($_POST['add'])){

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$contact = $_POST['con_num'];
			$home = $_POST['home_add'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			mysqli_query($con,"select * from userprofile");
			mysqli_query($con,"insert into userprofile(fname,lname,con_num,home_add,email,username,password,status) values('". $fname ."','". $lname ."','". $contact ."','". $home ."','". $email ."','". $username ."','". $password . "','1')");

		}

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

			<form name="add_admin" method="post" action="add_admin.php" enctype="multipart/form-data">
			
			<div id="title">Add Staff</div>
				<table>
					<tr>
						<td>First Name:</td>
						<td><input type="text"  class="field" name="fname" placeholder="First Name" /></td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td><input type="text" class="field" name="lname" placeholder="Last Name" /></td>
					</tr>
					<tr>
						<td>Contact Number:</td>
						<td><input type="text" class="field" name="con_num" placeholder="Contact Number" /></td>
					</tr><tr>
						<td>Home Address:</td>
						<td><input type="text" class="field" name="home_add" placeholder="Home Address" /></td>
					</tr>
					<tr>
						<td>E-mail Address:</td>
						<td><input type="text" class="field" name="email" placeholder="E-mail Address" /></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" class="field" name="username" placeholder="Username" /></td>
					</tr>
					<tr>
						<td>Password):</td>
						<td><input type="password" class="field" name="password" placeholder="Password" /></td>
					</tr>
					<table>
						<tr><td><button style="margin-left:150px;"type="submit" id="lol1" name="add" />Add Staff</button><td></tr>
					</table>
				</table>
				</form>
			
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

	
						