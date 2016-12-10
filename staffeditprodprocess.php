<?php
	
	include_once("connection/dbMain.php");
	header('location:staffeditprod.php');
	
	if(isset($_POST['edit'])){
		
				$ids = $_POST['id'];
				$imgID = $_POST['id'];
				
				$title = $_POST['prod_name'];
				$description = $_POST['prod_desc'];
				$price = $_POST['prod_price'];
				$category_id = $_POST['prod_category'];
				$author = $_POST['prod_author'];
				
				mysqli_query($con,"update products set title = '".$title."', description = '".$description."', price = '".$price."',
				category_id = '".$category_id."', author = '".$author."'  where id =". $ids) or die(mysql_error());
				

				mysqli_query($con,"update product_images set name = '".$name."' where prod_id =". $ids) or die(mysql_error());

					if($_FILES['fileField']['tmp_name'] != ""){
						$newname = "$imgID.jpg";	
						move_uploaded_file($_FILES['fileField']['tmp_name'],"img/$newname");
						
					}
	}
	else if(isset($_POST['delete'])){
			$ids = $_POST['id'];
			mysqli_query($con,"select * from products");
			mysqli_query($con,"delete from product_images where id =". $ids);
			mysqli_query($con,"delete from products where id =". $ids) or die(mysql_error());
			
	}
?>