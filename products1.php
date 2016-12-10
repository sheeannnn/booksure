<?php 
include('connection/dbMain.php');
if(isset($_SESSION['username'])){
header("location:controller.php?home");
}
include("includes/header.php");
?>

<div id="content-wrapper">
	<form name="myform" method="post" action="productprofile1.php">
	<?php
			$productspage= $_POST['productspage'];
			
			
			$query= "SELECT * FROM product_category where id=".$productspage;
			$product_cat_set = mysqli_query($con,$query);
			
			while($product_cat = mysqli_fetch_array($product_cat_set)){
	
			
				echo ("<div class='prod-cat-header'>");
				echo ($product_cat['cat_name']);
				
				echo("</div>");
				
		
				$query="SELECT * from products where category_id=".$product_cat['id'];
				$product_set=mysqli_query($con,$query);
				
				while($products=mysqli_fetch_array($product_set)){
					
					$result=mysqli_query($con,"SELECT prod_id from product_images where prod_id=". $products['id']);
					
					echo("<div class='products'>");
							while($a = mysqli_fetch_array($result)){
								echo("<input type='image' value='$products[id]' name='productsfile' class='prodthumb' src='img/" .$a['prod_id'].".jpg"."'>");
								echo("</input>");
								echo("<p id='names'>".$products['title']."</p>");
								echo("<p id='names'>"."By ". $products['author']."</p>");
								echo("<p id='names'>"."Php ". $products['price'] .".00 "."</p>");
								
								
							}
					echo("</div>");
				
			}
		}
	
			
	?>
	</form>
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