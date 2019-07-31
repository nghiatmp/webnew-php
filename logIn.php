<?php 
	session_start();
	require('templates/header.php');
	$loi = array();
	$loi['user']=$loi['pass']=$loi['login']= null;
	$user =$pass = null;
	if(isset($_POST['ok'])){
		if(empty($_POST['user'])){
			$loi['user']= '* Vui lòng nhập username';
		}else{
			$user = $_POST['user'];
		}
		if(empty($_POST['pass'])){
			$loi['pass']= '* Vui lòng nhập password';
		}else{
			$pass = $_POST['pass'];
		}
		if($user &&$pass){
			//ket noi
			$conn = new mysqli('localhost','root','','firstweb');
			//truy van
			$sql = " SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==1){
				$data = mysqli_fetch_assoc($result);
				$_SESSION['level'] = $data['level'];
				if($_SESSION['level']==2){
					header('location:admin/admin.php');
				}else{
					$_SESSION['user']= $user;
					header("location:index.php");
					exit();
				}
				
			}else{
				$loi['login'] = '* Thông tin không chính xác ';
			}
			$conn->close();

		}


	}



 ?>
	<div class="content">
			<form id="form-login" action="" method="post">
				<table>
					<tr>
						<td>UserName</td>
					    <td><input style="width: 200px;height: 30px;" type="" name="user"></td>
					</tr>
					<tr>
						<td>PassWord</td>
					    <td><input style="width: 200px;height: 30px;" type="password" name="pass"></td>
					</tr>
					<tr>
						<td colspan="2" style="padding-left: 70px;">
							<input style="width: 50px;height: 30px;"type="submit" name="ok" value="Login">
						</td>
					</tr>
				</table>
			</form>
			<div class="loi" style="width: 300px;height: 150px;margin: auto;color: red;">
				<?php 
					echo $loi['user'].'<br/>	';
					echo $loi['pass'];
					echo $loi['login'];

				 ?>
			</div>
	</div>
	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>