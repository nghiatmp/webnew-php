<?php 
	
	$id= $_GET['id'];
	$conn = new mysqli('localhost','root','','firstweb');
	$sql= "DELETE FROM subcategory where sub_id='$id'";
	mysqli_query($conn,$sql);
	header('location:list_subcategory.php');
	exit();
 ?>