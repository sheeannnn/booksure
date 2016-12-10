<html>
<head>
<script src="js/sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style/sweetalert.css"></link>

</head>
</html>	



<?php
	include_once("connection/dbMain.php");
	
	if(isset($_POST['addnewproduct'])){
	$name = $_POST['prod_name'];
	$description = $_POST['prod_desc'];
	$category = $_POST['prod_category'];
	$price = $_POST['prod_price'];
	$author = $_POST['prod_author'];

	mysqli_query($con,"select * from products");

	mysqli_query($con,"insert into products(title,description,price,category_id,author) values('". $name ."','". $description ."','".$price."','".$category."','".$author."')");


	$imgID = mysqli_insert_id($con);
				$newname = "$imgID.jpg";
				move_uploaded_file($_FILES['fileField']['tmp_name'],"img/$newname");
			
	
			echo ("<script>swal(
							{title: 'One Product Added.',},function(){window.location.href = 'addprod.php';});
				</script>");
				
?>