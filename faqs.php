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
	<div style="margin: 20px;">
		<h1>Frequently Asked Questions (FAQs)

		<h3>Why do I need to register on the site before I can place an order?</h3>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Establishing an online account with BookSure assures you that your purchasing information is secure, confidential and accessible to you.  Once you establish an account, you will only need to sign-in to place an order in the future, check on the status of your current order,  view past purchases or update your profile information.</p>

		<h3>How long does it take for delivery to PH destinations?</h3>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For domestic shipments, please allow 2 - 3 weeks for delivery.</p>

		<h3>How long does it take for delivery to International destinations?</h3>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When we ship orders to international destinations it can take 8-12 weeks when shipping surface postal mail, depending on final destination. Airmail can take 2-3 weeks. The charges for surface or airmail service, is based on the weight of the package.</p>

		<h3>Are transactions safe?</h3>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES. BookSure provides Internet security by:
		hosting our site on a secure server. No other company or organization shares the server we use to store information.
		Creating secure areas of the Web site for the transfer of confidential information such as your credit card number in our online bookstore. When using Internet Explorer, for example, you'll know an area of the site is secure when you see a lock in the bottom left order of your screen.</p>

		<h3>How will BookSure protect my anonymity?</h3>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confidentiality is important to us. BookSure respects your anonymity. Orders are sent in plain packages. We do not share our mailing list with any organization outside of BookSure. If you wish to discontinue receiving catalogs or email from us, you can do so by changing your Preferences if you are logged in. Or, contact us at 222-2222, email us, or follow the "unsubscribe" directions on your next email message.</p>
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