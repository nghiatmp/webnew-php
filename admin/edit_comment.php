<?php
	require('templates/header.php');
	$id=$_GET['id'];
	$YN=null;
	if(isset($_POST['ok'])){
		$YN=$_POST['YN'];
			$conn = new mysqli('localhost','root','','firstweb');
			$sql = "UPDATE comment SET cm_check='$YN' where cm_id='$id'";
			mysqli_query($conn,$sql);
			$conn->close();
			header('location:list_comment.php');
			exit();
	}
	
  ?>
<div class="comment" style="width: 300px;height: 120px;margin: 62px 350px;">
	<fieldset>
		<legend>Xét duyệt bình luận</legend>
		<form method="post" action="edit_comment.php?id=<?php echo $id;?>">
			<table style="margin: 40px;">
				<tr>
					<td>Duyệt bình luận</td>
					<td>
						<select name="YN">
							<option value="N">Chưa Duyệt</option>
							<option value="Y">Đã Duyệt</option>
						</select>
					</td>
					<tr style="">
						<td colspan="" rowspan="" headers=""></td>
						<td>
							<input type="submit" name="ok" value="Duyệt">
						</td>
					</tr>
				</tr>
			</table>
		</form>
	</fieldset>
</div>
<?php 
	require('templates/footer.php');

 ?>