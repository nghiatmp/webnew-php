<?php 
	require('templates/header.php');
	$loi= array();
	$loi['title']=$loi['image'] =$loi['intro']= $loi['content']=$loi['add']=null;
	$title=$cate=$images=$intro=$content=null;

	if(isset($_POST['ok'])){
		$cate = $_POST['cate'];

		//check tieu de
		if(empty($_POST['title'])){
			$loi['title']= "*Vui lòng nhập tiêu đề";
		}else{
			$title = mysqli_escape_string($_POST['title']);
		}

		//check hinh anh
		if($_FILES['image']['error']>0){
			$loi['image']="*vui lòng chọn hình ảnh";
		}else{
			$images=$_FILES['image']['name'];
		}
		//check mo ta
		if(empty($_POST['intro'])){
			$loi['intro']= "*Vui lòng nhập mô tả";
		}else{
			$intro = mysqli_escape_string($_POST['intro']);
		}

		//check noi dung
		if(empty($_POST['content'])){
			$loi['content']= "*Vui lòng nhập noi dung";
		}else{
			$content = mysqli_escape_string($_POST['content']);
		}

		if($cate && $title && $images && $intro && $content){
			
			$conn = new mysqli('localhost','root','','firstweb');
			$sql ="INSERT INTO news(title,image,introduce,content,cate_id) 
				values('$title','$images','$intro','$content','$cate')";
			mysqli_query($conn,$sql);
			
			$loi['add']= "*Thêm Thành Công";

			//upload file
			move_uploaded_file($_FILES['image']['tmp_name'],"library/images/".$_FILES['image']['name']);					
		}


	}
 ?>


<div class="add_article">
	<div class="erroraddart" style="width: 200px;height: 100px;margin: auto;color: red;">
		<?php 
			echo $loi['title']."<br/>";
			echo $loi['image']."<br/>";
			echo $loi['intro']."<br/>";
			echo $loi['content']."<br/>";
			echo $loi['add'];
		 ?>
	</div>
	<fieldset>
		<legend>Thêm Bài Viết Mới</legend>
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
									echo "<option value='$row3[cate_id]'>$row3[cate_title]</option>";
								}
								$conn->close();
								
							 ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tiêu đề</td>
					<td>
						<input type="text" size="50" name="title">
					</td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Mô Tả</td>
					<td>
						<textarea rows="10" cols="50" name="intro"></textarea>
					</td>
				</tr>
				<tr>
					<td>Nội dung</td>
					<td>
						<textarea  rows="15" cols="50" name="content"></textarea>
					</td>
				</tr>
				<script type="text/javascript">
					CKEDITOR.replace('content');
				</script>
				<tr>
					<td colspan="2" rowspan="" headers="">
						<input type="submit" name="ok">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	
</div>


 <?php 

 require('templates/footer.php');
  ?>