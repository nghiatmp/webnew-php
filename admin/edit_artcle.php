<?php 
require('templates/header.php');

	$id=$_GET['id'];
	//mo ket noi
	$conn = new mysqli('localhost','root','','firstweb');
	$sql = "SELECT * FROM news WHERE new_id='$id'";
	$query=mysqli_query($conn,$sql);
	$result=mysqli_fetch_assoc($query);
	$conn->close();
	$loi =array();
	$loi['title'] = $loi['intro']=$loi['content']=$loi['add']= null;
	$cate =$title=$image=$intro=$content=null;
		if(isset($_POST['ok'])){
			$cate = $_POST['cate'];
			if(empty($_POST['title'])){
				$loi['title'] = " *Vui long nhập tiêu đề";
			}else{
				$title= $_POST['title'];
			}
			if($_FILES['image']['error']>0){
				$image='none';
			}else{
				$image = $_FILES['image']['name'];
			}
			if(empty($_POST['intro'])){
				$loi['intro']= "*vui lòng nhập mô tả";
			}else{
				$intro= $_POST['intro'];
			}
			if(empty($_POST['content'])){
				$loi['content']= "*Vui lòng nhập nội dung";
			}else{
				$content= $_POST['content'];
			}
			if( $title && $image && $intro &&$content){
				$conn = new mysqli('localhost','root','','firstweb');
				if($image == 'none'){
					$sql1="UPDATE news set title='$title',introduce = '$intro',content='$content',cate_id='$cate' where new_id = '$id'";
					mysqli_query($conn,$sql1);
					$loi['add']=' *update thành công';
				}else{
					
					$sql1="UPDATE news set title='$title',image ='$image',introduce = '$intro',content='$content',cate_id='$cate' where new_id = '$id'";
					mysqli_query($conn,$sql1);
					$loi['add']=' *update thành công';
					//upload file
					move_uploaded_file($_FILES['image']['tmp_name'],"library/images/".$_FILES['image']['name']);
					$conn->close();
				}
			}
		}

 ?>


<div class="edit_article">
	<div class="erroraddart" style="width: 200px;height: 100px;margin: auto;color: red;">
		<?php 
			echo $loi['title']."<br/>";
			echo $loi['intro']."<br/>";
			echo $loi['content']."<br/>";
			echo $loi['add'];
		 ?> 
	</div>
	<fieldset>
		<legend>Chỉnh sửa bài viết</legend>
		<form method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Chuyên Mục</td>
					<td>
						<select name="cate">
							<?php 

								$conn = new mysqli('localhost','root','','firstweb');
								$sql3='SELECT* FROM category';
								$query3=mysqli_query($conn,$sql3);
								while ($row3=mysqli_fetch_assoc($query3)) {
									if($result['cate_id']==$row3['cate_id']){
										echo "<option value='$row3[cate_id]' selected='selected'>$row3[cate_title]</option>";
									}else{
										echo "<option value='$row3[cate_id]'>$row3[cate_title]</option>";
									}
									
								}
								$conn->close();
							 ?>
							
							
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Tiêu đề</td>
					<td>
						<input type="text" size="50" name="title" value="<?php echo $result['title'] ?>">
					</td>
				</tr>
				<tr>
					<td>Hình ảnh cũ</td>
					<td><img src="library/images/<?php echo $result['image'];?>" alt=""></td> 
				</tr>
				<tr>
					<td>Hình ảnh mới</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Mô Tả</td>
					<td>
						<textarea rows="10" cols="50" name="intro" value=""><?php echo $result['introduce']?></textarea>
					</td>
				</tr>
				<tr>
					<td>Nội dung</td>
					<td>
						<textarea  rows="15" cols="50" name="content" value=""><?php echo $result['content'] ?></textarea>
					</td>
				</tr>
				<script type="text/javascript">
					CKEDITOR.replace('content');
				</script>
				<tr>
					<td colspan="2" rowspan="" headers="">
						<input type="submit" name="ok" value="update">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	
</div>


 <?php 

 require('templates/footer.php');
  ?>