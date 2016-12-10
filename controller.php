<?php

include('connection/dbMain.php');
	if(isset($_GET['home'])){
		header("location:home.php");
	}
	
	else{
		if(isset($_GET['logout'])){
		session_destroy();
		header("location:index.php"); }
	
	}
	
?>