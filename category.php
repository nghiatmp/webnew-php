<?php 
	session_start(); 
	require('templates/header.php');
	


 ?>
	<div class="content">
		<div class="left">
			<?php 
				$id= $_GET['id'];
				//mo ket noi
				$conn = new mysqli('localhost','root','','firstweb');
				$sql2 = "SELECT cate_id,cate_title from category where cate_id='$id'";
				$query3=mysqli_query($conn,$sql2);
				$result=mysqli_fetch_assoc($query3);
				echo "<h2 style='padding:20px 5px; border-bottom: 1px solid black'>$result[cate_title]</h2>";
					$display=2;
					
					if(isset($_GET['begin'])){
						$position=$_GET['begin'];
					}else{
						$position = 0;
					}
				$sql= "SELECT new_id,title,image,introduce,cate_id from news where cate_id='$id' order by new_id desc limit $position,$display";
				$query=mysqli_query($conn,$sql);
				
				while ($row=mysqli_fetch_assoc($query)) {	
					echo "<div class='news'> ";
						echo "<h3><a href='detail.php?id=$row[new_id]'>$row[title]</a></h3>";
						echo "<img src='admin/library/images/$row[image]' alt=''>";
						echo "<p>$row[introduce]</p>";
						echo "<div class='clearfix'></div>";
					echo "</div>";
				}
				$conn->close();
			 ?>

			<div class="pagination">
				<?php 
					$conn = new mysqli('localhost','root','','firstweb');
					$display=2;
					$sql4= "SELECT *from news where cate_id ='$id' ";
					$query4= mysqli_query($conn,$sql4);
					$sum_news= mysqli_num_rows($query4);
					$sum_pages= ceil($sum_news/$display);

					if($sum_pages>1){
						echo "<ul>";
						$current = ($position/$display)+1;
						if($current!=1){
							$pre = $position-$display;
							echo "<li><a href='category.php?id=$id&begin=$pre' title=''><< Pre</a></li>";
						}

						
						for($i=1;$i<=$sum_pages;$i++){
							$begin = ($i-1)*$display;
							if($i == $current){
								echo "<li><a href='category.php?id=$id&begin=$begin' style='color:red;'>$i</a></li>";
							}
							else{
								echo "<li><a href='category.php?id=$id&begin=$begin'>$i</a></li>";
							}
							
						}
						if($current!=$sum_pages){
							$next=$position+$display;
							echo "<li><a href='category.php?id=$id&begin=$next' title=''> Next >></a></li>";
						}
						echo "</ul>";
					}
						

				 ?>
				
					
					<!-- li><a href="#" title="">2</a></li>
					<li><a href="#" title="">3</a></li>
					<li><a href="#" title="">Next</a></li>
					<li><a href="#" title="">Last</a></li> -->
				
			</div>

		</div>
		<?php 
			require('templates/content-right.php');
		 ?>
	</div>
	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>