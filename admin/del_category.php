<?php
	$id=$_GET['id'];
	//ket noi csdl
	$conn = new mysqli('localhost','root','','firstweb');
	//truy van
	$sql = "DELETE from category where cate_id='$id'";
	mysqli_query($conn,$sql);
	//chuyen trang
	header('location:list_category.php');
	exit();
	
  ?>
