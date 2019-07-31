<?php
	session_start();	
	if($_SESSION['level']==2){
		//echo "trang quan tri cho admin";
		require('templates/header.php');
		require('templates/footer.php');

	}else{
		header('location:../index.php');
		exit();
	} 
	

 ?>