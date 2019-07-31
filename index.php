<?php
	session_start(); 
	require('templates/header.php');
 ?>
	<div class="content">
		<div class="left">
			<?php 
				$conn = new mysqli('localhost','root','','firstweb'); 
				$sql="SELECT cate_id,cate_title FROM category";
				$query1=mysqli_query($conn,$sql);
				while ($data1=mysqli_fetch_assoc($query1)) {
					echo "<div class='news'>";
				     echo "<div class='category'>";
						echo "<a href=''>$data1[cate_title]</a>";
					echo "</div>";
				$sql = "SELECT new_id,title,image,introduce,cate_id from news WHERE cate_id= $data1[cate_id] ORDER BY new_id desc";
					$query=mysqli_query($conn,$sql);
					$data=mysqli_fetch_assoc($query);
					echo "<div class='article'>"; 
					echo "<h3><a href='detail.php?id=$data[new_id]' title='$data[title]'>$data[title]</a></h3>";
					echo "<img src='admin/library/images/$data[image]'>";

					echo "<p>$data[introduce]</p>";
					echo "<div class='clearfix'></div>";
				echo "</div>";
				 
				 	echo "<div class='list-article'>";
								$sql = "SELECT new_id,title from news WHERE cate_id= $data1[cate_id] ORDER BY new_id desc limit 1,3";
								$query=mysqli_query($conn,$sql);
								while ($data=mysqli_fetch_assoc($query)) {
									echo "<ul>";
										echo "<li><a href='detail.php?id=$data[new_id]'>$data[title]</a></li>";
									echo "</ul>";
								}

					echo "</div>";
							
				  echo "<div class='clearfix'></div>";
			
				echo "</div>";
				}
				
			 ?>

			
		</div>
		<?php 
			require('templates/content-right.php');
		?>
	</div>
	<div class='clearfix'></div>


	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>