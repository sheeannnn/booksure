<?php
	include_once("connection/dbMain.php");
	
	if(!(isset($_SESSION['username']))){
	header("location:index.php");
	}
		if(isset($_GET['cart'])){
$orderid = $_GET['cart'];// product id
//$quantity =$_POST['quantity'];
$ownerid = $_SESSION['id']; // who ordered based on id

$price = 0;

$result = mysqli_query($con,"select * from products where id=".$orderid);
while($row=mysqli_fetch_array($result))
{
?>

			<?php 
		
				$query= "SELECT * FROM products where id=". $orderid;
				$product_set= mysqli_query($con,$query);
			
		
			while ($products= mysqli_fetch_array($product_set))
			{
				
				$orderproduct = $products['id'];
				$booktitle= $products['title'];
				$price = $products['price'];
				
			}
			
			mysqli_query($con,"select * from orderline");
			mysqli_query($con,"insert into orderline(ownerid,orderproduct,booktitle,orderprice,quantity) values ('".$ownerid."', '".$orderproduct."', '".$booktitle."', '".$price."','1')");
				
				
			header('location: productprofile.php');
			
			?> 
				
				
<?php
		}}
?>









