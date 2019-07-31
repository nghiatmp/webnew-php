
<?php
	session_start();
	$id = $_GET['id'];  
	require('templates/header.php');
	
	$loi=array();
	$loi['namecm']=$loi['message']=null;
	$namecm =$message =null;

	if(isset($_POST['okcm'])){
		if(empty($_POST['namecm'])){
			$loi['namecm']='*vui lòng nhập tên bạn';
		}else{
			$namecm =$_POST['namecm'];
		}
		if(empty($_POST['message'])){
			$loi['message']='*vui lòng nhập nội dung comment';
		}else{
			$message =$_POST['message'];
		}
		if($namecm && $message){
			$conn = new mysqli('localhost','root','','firstweb');
			$sql2="INSERT INTO comment(name,message,cm_time,cm_check,new_id)
			 values('$namecm','$message',now(),'N','$id')";
			 mysqli_query($conn,$sql2);
			 $conn->close();
			 echo "<script type='text/javascript'>";
			 	echo "alert('Bình luận của ban đã đc gửi lên và đang chờ kiểm duyệt');";
			 echo "</script>";

		}
	}
 ?>
	<div class="content">
		<div class="left">
			<?php
			 
				$conn = new mysqli('localhost','root','','firstweb');
				$sqli = "SELECT new_id,title,introduce,content,cate_id FROM news where new_id='$id'";
				$queri= mysqli_query($conn,$sqli);
				$resulti = mysqli_fetch_assoc($queri);
					echo "<div class='detail-article'>";
					echo "<h2>$resulti[title]</h2>";
					echo "<p style='color: gray;'>$resulti[introduce]</p>";
					echo "<p>$resulti[content]</p>";
					echo "</div>";
				$conn->close();


			 ?>
			<div class="different-article">
				
				<?php
					$conn = new mysqli('localhost','root','','firstweb');
					$sql1="SELECT new_id,title,cate_id from news where cate_id='$resulti[cate_id]' and new_id <'$id' order by new_id desc limit 3";
					$query2=mysqli_query($conn,$sql1);
					if(mysqli_num_rows($query2)!=0){

					echo "<p>Các bài viết khác</p>";
					echo "<ul>";
					
					
					while ($row=mysqli_fetch_assoc($query2)) {
					 	echo "<li><a href='detail.php?id=$row[new_id]'>$row[title]</a></li>";
					 }
					 $conn->close(); 
					echo "</ul>";
					}

				 ?>
				
			</div>
			<div class="comment">
				<fieldset>
					<legend>Comment</legend>
					<form method="post" action="detail.php?id=<?php echo $id?>">
						<table>
							<tr>
								<td>Name</td>
								<td><input placeholder="nhập tên của bạn"	 type="" name="namecm" value="<?php echo $loi['namecm']; ?>"> <br></td>
							</tr>
							<tr>
								<td>Comment</td>
								<td><textarea name="message"><?php echo $loi['message'] ?></textarea></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="okcm" value="submit">
								</td>
							</tr>
						</table>
						
						

					</form>
				</fieldset>
			</div>
			<div class="show-comment">
				<?php 
					$conn = new mysqli('localhost','root','','firstweb');
					$sql3="SELECT cm_id, name,message,cm_time,cm_check FROM comment where cm_check='Y' and new_id='$id'";
					$query3= mysqli_query($conn,$sql3);
					while ($row3=mysqli_fetch_assoc($query3)) {
						echo "<div class='comm'>";
							echo "<img src='images/note82.jpg' alt=''>";
						echo "<div class='mess'>";
							echo "<p style='color: blue;'>$row3[name] <span style='color: gray;'>$row3[cm_time]</span></p>";
							echo "<p>$row3[message]</p>";
						echo "</div>";
						echo "</div>";
						echo "<div class='clearfix'></div>";
					}
					$conn->close();
					
				 ?>

							
				
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