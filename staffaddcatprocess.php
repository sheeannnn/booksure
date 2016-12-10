<html>
<head>
<script src="js/sweetalert.js"></script>
 <link rel="stylesheet" type="text/css" href="style/sweetalert.css"></link>

</head>
</html>	


<?php
	include_once("connection/dbMain.php");
	
	
	
		
			$catname = $_POST['catname'];
			$description = $_POST['description'];
			
				mysqli_query($con,"select * from product_category");
				mysqli_query($con,"insert into product_category(cat_name, description)
					values('".$catname."','".$description."')") or die(mysql_error());
				
				
			$imgID = mysqli_insert_id($con);
				$newname = "$imgID.jpg";
				move_uploaded_file($_FILES['fileField']['tmp_name'],"cat_img/$newname");
				
			
			echo ("<script>swal(
							{title: 'Once Category Added.',},function(){window.location.href = 'staffaddcat.php';});
							</script>");


?>