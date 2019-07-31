<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php 

		if(isset($id)){
			$conn = new mysqli('localhost','root','','firstweb');
			$sqll="SELECT new_id ,title from news where new_id= '$id' ";
			$queryy= mysqli_query($conn,$sqll);
			$result3=mysqli_fetch_assoc($queryy);
			echo "<title>$result3[title]</title>";
		}else{
			echo "<title>demo</title>";
		}
		
	 ?>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<header>
		<?php 
		if(isset($_SESSION['user'])){
				echo "Welcome ".$_SESSION['user']." || <a href='LogOut.php'>LogOut</a>";
			}else{
				echo "<a href='logIn.php'>Login</a> ||";
				echo "<a href='register.php'>Register</a>";
			}
		 ?>
		
	</header>
	<div class="menu">
		<ul>
			<li><a href="index.php" title="">Trang chủ</a></li>
			<?php 
				//mo ket noi
				$conn = new mysqli('localhost','root','','firstweb');
				$sql = "SELECT cate_id,cate_title from category";
				$result=mysqli_query($conn,$sql);
				while ($data=mysqli_fetch_assoc($result)) {
					$sql2="SELECT * FROM subcategory where cate_id='$data[cate_id]'";
					$result2=mysqli_query($conn,$sql2);
					if(mysqli_num_rows($result2)!=0){
						echo "<li>";
						echo "<a href='category.php?id=$data[cate_id]'>$data[cate_title]</a>";
						echo "<ul class='table-menu'>";
							while ($data2=mysqli_fetch_assoc($result2)) {
								echo "<li><a href=''>$data2[sub_title]</a></li>";
							}
							
						echo "</ul>";
					echo "</li>";
				}else{
					echo "<li>";
						echo "<a href='category.php?id=$data[cate_id]'>$data[cate_title]</a>";
					echo "</li>";
				}

					
				}
				
			 ?>
			
		</ul>
	</div>