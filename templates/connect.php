
 <?php 
 	$username = "test";

 	$conn = new mysqli('localhost','root','','firstweb');
			$sql = "INSERT INTO user(username,password,email,birthday,gender,level)
			 VALUES('$username','123','abc@gmail','08-08-98','1','2') ";
			if(mysqli_query($conn,$sql)){
				echo "thanh cong";
			}else{
				echo 'THATBAN'.$conn->error;
			}
			//$loi['regiser']= '*Dang ki thanh cong <a href="login.php" title="">Dang nhap</a>';
			//dong ket noi;
			$conn->close();

  ?>