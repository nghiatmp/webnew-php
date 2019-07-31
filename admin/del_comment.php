<?php 
	$id=$_GET['id'];
	$conn = new mysqli('localhost','root','','firstweb');
	$sql= "DELETE FROM comment where cm_id='$id'";
	mysqli_query($conn,$sql);
	$conn->close();

	header('location:list_comment.php');
	exit();

 ?>