<?php 
	$id= $_GET['id'];
	echo $id;
	//ket noi
	$conn = new mysqli('localhost','root','','firstweb');
	//truy van
	$sql ="DELETE FROM user WHERE user_id = '$id'";
	mysqli_query($conn,$sql);

	$conn->close();	
	header('location:list_user.php');
	exit();

 ?>