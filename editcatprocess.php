<?php
include_once("connection/dbMain.php");


		if(isset($_POST['edit'])){

			$id = $_POST['id'];
			$cat_name = $_POST['cat_name'];
			$cat_desc = $_POST['cat_desc'];
			mysqli_query($con,"select * from product_category");
			mysqli_query($con,"update product_category set cat_name = '".$cat_name."',description = '".$cat_desc."' where id=".$id);
					header('location:editcat.php');
		}
		
		else if(isset($_POST['delete'])){
			$id = $_POST['id'];
			mysqli_query($con,"select * from product_category");
			mysqli_query($con,"delete from product_category where id =". $id);
			mysqli_query($con,"delete from category_images where id =". $id) or die(mysql_error());
			header('location:editcat.php');
		}
		

?> 