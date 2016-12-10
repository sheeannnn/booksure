<?php 
include('connection/dbMain.php');
if(isset($_SESSION['username'])){
header("location:controller.php?home");
}
include_once("includes/header.php");

?>
<div id="content-wrapper">
	<!--text-->
	<div style="text-align:center;color:black;font-family: 'Avant Garde', Avantgarde, 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;font-size:45px;">
	Welcome to Book Sure</div>
	
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
<script>
document.querySelector('a#test').onclick = function(){
	swal("Please Login to Continue!");
};
</script>
</html>
	
	