<?php 
include('connection/dbMain.php');
if(isset($_SESSION['username'])){
header("location:controller.php?home");
}
include("includes/header.php");
?>

<div id="content-wrapper">
	<?php
			$productfile= $_POST['productsfile'];
			
			$query= "SELECT * FROM products where id=".$productfile;
			$product= mysqli_query($con,$query);
			
			while($product_cat = mysqli_fetch_array($product)){
			echo("<div class='profile'>");
			
				echo ("<div class='prod-cat-header'>");
				echo ($product_cat['title']);
				echo("</div>");
				
				echo("<img class='product' src='img/" .$product_cat['id'].".jpg"."'>");
				echo ("<div class='bookdescription'>".$product_cat['description']."</div>");
				echo ("<div class='details'>"."By ". $product_cat['author']."</div>");
				echo ("<div class='details'>"."Php ".$product_cat['price'].".00"."</div>");
			
				
				echo("<button id='cart'>");
				echo("Add to Cart");
				echo("</button>");
				
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
</body>
<script>
document.querySelector('button#cart').onclick = function(){
	swal("Please Login to Continue!");
};

document.querySelector('a#test').onclick = function(){
	swal("Please Login to Continue!");
};

</script>
</html>