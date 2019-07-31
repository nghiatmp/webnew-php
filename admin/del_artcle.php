<?php 

	 $id=$_GET['id'];
	$conn = new mysqli('localhost','root','','firstweb');
	$sql = "DELETE FROM news WHERE new_id = '$id'";
	mysqli_query($conn,$sql);
	$conn->close();	
	header('location:list_article.php');
	exit();

 ?>