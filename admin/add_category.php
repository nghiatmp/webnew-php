 <?php 
 require('templates/header.php');
 $loi = array();
 $cate= null;
 $loi['cate']=$loi['title']=null;

 if(isset($_POST['ok'])){
 	if(empty($_POST['cate'])){
 		$loi['cate']='* Vui lòng nhập chuyên mục';
 	}else{
 		$cate= $_POST['cate'];
 	}
 }
 if($cate){
 	//mo ket noi
 	$conn = new mysqli('localhost','root','','firstweb');

 	$sql1= "SELECT cate_title from category where cate_title='$cate'";
 	$query=mysqli_query($conn,$sql1);
 	if(mysqli_num_rows($query)==0){
 		$sql= "INSERT INTO category(cate_title) VALUES ('$cate')";
 		$result=mysqli_query($conn,$sql);
 		$loi['title']= 'Thêm thành công  <a href="list_category.php" title="">Về trang quản lý</a>';
 	}else{
 		$loi['title']='Tên chuyên mục đã tồn tại';
 	}

 	
 }


  ?>

  <div class="addcate">
    <div class="errorcate" style="width: 200px; height: 70px;margin: auto;color: red;">
    <?php 
        echo $loi['cate'];
        echo $loi['title'];

     ?>
  </div>
  	<fieldset>
  		<legend>Thêm chuyên mục</legend>
  		<form action="" method="post">
  			<label>Name</label>
  			<input id="addinput" type="text" name="cate">
  			<input type="submit" name="ok" value="Add">
  		</form>
  	</fieldset>
  </div>
  
  <?php 
   require('templates/footer.php');
   ?>