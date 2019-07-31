<?php
	 require('templates/header.php');
	$id=$_GET['id'];
	$conn = new mysqli('localhost','root','','firstweb');
	$sql1="SELECT sub_title from subcategory where sub_id='$id'";
	$query=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($query);
	$loi=array();
		$loi['name']=null;
		$cate=$name=null;
		if(isset($_POST['ok'])){
			$cate = $_POST['catecha'];
			if(empty($_POST['name'])){
				$loi['name']= '*Vui lòng nhập tên chuyên mục con';
			}else{
				$name= $_POST['name'];
			}
			if($name){
				$conn = new mysqli('localhost','root','','firstweb');
				$sql1="UPDATE subcategory set sub_title='$name', cate_id='$cate' where sub_id='$id'";
				mysqli_query($conn,$sql1);
				$conn->close();
				header('location:list_subcategory.php');
			}
		}
	
 ?>

 <div class="addsubcate">
	<fieldset>
		<legend>Chỉnh sửa chuyên mục con</legend>
		<form method="post" action="">
			<table>
			<tr>
				<td>Chuyên mục cha</td>
				<td>
					
					<select name="catecha" >
						<?php 
						$conn = new mysqli('localhost','root','','firstweb');
						$sql = 'SELECT *from category';
						$query=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_assoc($query)) {
							echo "<option value='$row[cate_id]'>$row[cate_title]</option>";
						}
						$conn->close();

					 	?>
						
						<option value="">Thể Thao</option>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="<?php echo $row1['sub_title'] ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="ok" value="update" >
				</td>
			</tr>
		</table>
		</form>
		<div class="error" style="margin: auto;color: red;text-align: center;">
			<?php echo $loi['name'] ?>
		</div>
	</fieldset>
</div>
 <?php  
		require('templates/footer.php');
 ?>