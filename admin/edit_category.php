<?php 
   require('templates/header.php');
   $id=$_GET['id'];

   $loi= array();
   $loi['error']=$loi['cate']=null;
   $cate=null;
   if(isset($_POST['ok'])){
      if(empty($_POST['cate'])){
        $loi['error']= '*Nhập dữ liệu cần thay đổi';
      }else{
        $cate = $_POST['cate'];
      }
      if($cate){

        $conn = new mysqli('localhost','root','','firstweb');
        $sql = "UPDATE category SET cate_title = '$cate' where cate_id=$id";
        mysqli_query($conn,$sql);
        header('location:list_category.php');
        $conn->close();
      }
   }

   $conn = new mysqli('localhost','root','','firstweb');
   $sql="SELECT cate_id,cate_title FROM category where cate_id='$id'";
   $result=mysqli_query($conn,$sql);
   $data=mysqli_fetch_assoc($result);
   $conn->close();
   
   


 ?>


<div class="addcate">
   <div class="errorcate" style="width: 200px; height: 70px;margin: auto;color: red;">
        <?php 
          echo $loi['cate'];
          echo $loi['error'];
         ?>
  </div>
  	<fieldset>
  		<legend>Chỉnh sửa chuyên mục</legend>
  		<form action="edit_category.php?id=<?php echo $id ?>" method="post">
  			<label>Name</label>
  			<input id="addinput" type="text" name="cate" value="<?php echo  $data['cate_title']?>">
  			<input type="submit" name="ok" value="Update">
  		</form>
  	</fieldset>
  </div>
 
  <?php 
   require('templates/footer.php');
   ?>