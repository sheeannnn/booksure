<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
	
	
	$user=$_SESSION['username'];
	$query = "SELECT * FROM userprofile WHERE username='$user'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);

	include_once("includes/userheader.php");
?>
<div id="content-wrapper">

	<form name="myform" method="post" action="products.php">
	
		<?php
		
		
		$query= "SELECT * FROM product_category";
		$product_cat_set = mysqli_query($con,$query);
		
		
		while($product_cat = mysqli_fetch_array($product_cat_set)){
			echo("<div style='height:350px;'>");
			
				echo ("<div class='prod-cat-header'>");
				echo ($product_cat['cat_name']);
				
				echo("</div>");

				$query= "SELECT * FROM product_category where id=".$product_cat['position'];
				$product_set= mysqli_query($con,$query);
			
			
				while ($products= mysqli_fetch_array($product_set))
				{
					$result= mysqli_query($con,"SELECT description from product_category where id=". $products['id']);
					
					
					echo("<div class='description'>");
						while($a = mysqli_fetch_array($result)){
						echo("<br>");	
						 echo($a['description']);
							echo("<br>");	
						}

					echo("<br>");	
					echo("<button id='lol' value='$products[id]' type='submit' name='productspage'>");
					echo("See Products");
					echo("</button>");
					echo("</div>");	
				

				
			
					$image = mysqli_query($con,"SELECT * from product_category where category_id=".$product_cat['id']);
					$product_image= mysqli_query($con,$query);
						
					while($products=mysqli_fetch_array($product_image))	
					{
						$result=mysqli_query($con,"SELECT id from category_images where category_id=".$product_cat['id']);
						
						
							while($b=mysqli_fetch_array($result)){
								echo("<img class='prod-img-thumb' src='cat_img/".$b['id'].".jpg"."'>");
							}
						
						
					}
				
			echo("</div>");
				echo("<br>");
			}
	
		
		}

		?>

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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type = "text/javascript" language = "javascript"> 
function refresh_cart(){ 
$.post( "cart.php", { id: 2  }, 
function(data) { $('#melet').html("" +data); } ); } 

setInterval(function(){ refresh_cart() }, 100); 

</script>