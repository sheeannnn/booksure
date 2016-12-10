<?php 
include('connection/dbMain.php');
if(isset($_SESSION['username'])){
	if($_SESSION["status"]==2){
		header("location:controller.php?home");
	}else{
		header("location: adminhome.php");
	}
}
include("includes/header.php");

?>
<div id="content-wrapper">

	<div id="title">Login	&nbsp;
	<img src="imgs/login.png" alt="Smiley face" height="42" width="42"></img>
	</div>
	
	<div id="forms"><!--login-->
			<form name="myForm" action="login_process.php" method="post">
			<table>
				<tr>
					<td><input class="field" type="text" name="username" placeholder="Username"></td>
				</tr>
				
				<tr>
					<td><input  class="field" type="password" name="password" placeholder="Password"></td>
				</tr>
				
			</table>
		<br>
		<div>
			<table>
				<tr>
					<td><input class="low3" type="submit" value="Login"></td>
				</tr>
			</table>
		</div>
			</form>
	</div>	
	<!-- Login ends -->

	<!-- Registration -->

	<div id="title2">Sign up for free
	<img src="imgs/register.png" alt="Smiley face" height="42" width="42"></img>
	</div>
	
	<div id="forms2">
	<form name="myForm" action="register_process.php" method="post">

			<table >
				<tr>
					<td> <input type="text" name="fname" placeholder="First Name" class="field"> </td>
					<td>  <input  type="text" name="lname" placeholder="Last Name" class="field"> </td>
				</tr>
				
				<tr>
					<td> <input placeholder="Billing/Shipping Address" type="text" name="home_add" class="field">  </td>
					<td> <input type="text" placeholder="Email Address" name="email" class="field"> </td>
				</tr>
				<tr>
					<td> <input placeholder="Contact Number" type="text" name="con_num" class="field">  </td>
				</tr>
			</table>
			<br>
	
			<table >
				<tr>
					<td><input  type="text" name="username" placeholder="Username" class="field"> </td>
				</tr>
				<tr>
					<td> <input  type="password" name="password" placeholder="Password" class="field"></td>
				</tr>
			</table>
			</div>
			<div>
			<table>
	
				<tr>
					<td><input id="hello" class="low4" type="submit" name="myform" value="Register"></td>
				</tr>
				
			</table>	
			</div>
		
		</form>
</div><!--end content wrapper-->


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
<script>
document.querySelector('a#test').onclick = function(){
	swal("Please Login to Continue!");
};
</script>
</script>
</html>
