<?php 
include('connection/dbMain.php');
if(isset($_SESSION['username'])){
header("location:controller.php?home");
}
include("includes/header.php");
?>

<!--body starts-->
<div id="content-wrapper">
	<div style="margin: 20px;">
		<h1 style="color:black";>About Us</h1>
			<p>The BookSure is owned and operated by the students of University of Southeastern Philippines. Our primary purpose is to provide the essential books, supplies and services to support the educational goals of our students, faculty, staff and the other members of our college community. We are proud that all bookstore proceeds remain a part of the school's assets. We love to read and discovered that we could share our hundreds of books with others by selling them online. Our goal is to give a second life to our books by getting them in the hands of readers across the globe. </p>
			<p>You may reach us at info@booksure.com or call us at (082) - 222 22 22.</p>
			<br>
			
		<h1 style="color:black";>Meet the team</h1>
		
					<center>	
						<h1 style="color:black;font-size:40px;">Shee Ann</h1><img src="imgs/sheep.jpeg" style="position:relative;height:150px; width:150px; border:solid; border-radius:5em"></img>
						<h1 style="color:black;font-size:40px;">Beau Gabriel</h1><img src="imgs/bow.jpeg" style="position:relative;height:150px; width:150px; border:solid; border-radius:5em"></img>
					</center>
				
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
<script>
document.querySelector('a#test').onclick = function(){
	swal("Please Login to Continue!");
};
</script>
</html>