<?php 
	require('templates/header.php');
	$loi= array();

	$username = "test";

	$user = $pass = $email = $birthday = $gender =$day =$month=$year= NULL;
	$loi['user'] =$loi['pass']= $loi['email'] =$loi['birthday'] =$loi['birthday'] =$loi['gender'] =$loi['regiser'] =null;
	if(isset($_POST['ok'])){
		//check nhap username chua
		if(empty($_POST['user'])){
			$loi['user'] = '* Vui lòng nhập username';
		}else{
			$user = $_POST['user'];
		}
		//check da nhap password chua
		if(empty($_POST['pass'])){
			$loi['pass'] = '* Vui lòng nhập password';
		}else{
			$pass= $_POST['pass'];
		}

		//check da nhap email chua

		if(empty($_POST['email'])){
			$loi['email'] = '* Vui lòng nhập email';
		}else{
			$email= $_POST['email'];
		}

		//check da nhap ngay thang nam sinh chua
		if( $_POST['day'] == 'ngay' || $_POST['month'] == 'thang' || $_POST['year'] == 'nam'){
			$loi['birthday'] = '* Vui lòng nhập birthday';
		}else{
			$day = $_POST['day'];
			$month =$_POST['month'];
			$year = $_POST['year'];
		}

		//check da nhap gender chua
		if(empty($_POST['gender'])){
			$loi['gender'] = '* Vui lòng nhập gender';
		}else{
			$gender = $_POST['gender'];
		}

		// if( $user && $pass && $email && $birthday && $day &&$month &&$year && $gender ){
		if( $user && $pass && $email && $day && $month && $year && $gender){
			$conn = new mysqli('localhost','root','','firstweb');
			$sql="SELECT* from user where username= '$user'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==0){
				$sql = "INSERT INTO user(username,password,email,birthday,gender,level)
				VALUES('$user','$pass','$email','$year-$month-$day','$gender','1') ";
				mysqli_query($conn,$sql);
				$loi['regiser']= '*Dang ki thanh cong <a href="login.php" title="">Dang nhap</a>';
			}else{
				$loi['regiser']= '*user đã có người sử dụng';
			}
			
			//dong ket noi;
			$conn->close();		
		}
	}




 ?>
	<div class="content">
			<form id="form-register" action="" method="post">
				<h2>Register</h2>
				<table>
					<tr>
						<td>UserName</td>
					    <td><input style="width: 200px;height: 30px;" type="text" name="user"></td>
					</tr>
					<tr>
						<td>PassWord</td>
					    <td><input style="width: 200px;height: 25px;" type="password" name="pass"></td>
					</tr>
					<tr>
						<td>Email</td>
					    <td><input style="width: 200px;height: 25px;" type="email" name="email"></td>
					</tr>
					<tr>
						<td>Birthday</td>
					    <td>
					    	<select name="day">
					    		<option value="ngay">Day</option>
					    		<?php 
                                  for($i=1;$i<=31;$i++){
                                  	echo "<option value='$i'>$i</option>";
                                  }
					    		 ?>
					    	</select>

					    	<select name="month">
					    		<option value="thang">Month</option>
					    		<?php
					    		$a= [1=>'Jan','Feb','Mar','Apr','May'];
                                 foreach ($a as $key => $value) {
                                 	echo "<option value='$key'>$value</option>";
                                 }
					    		 ?>
					    	</select>
					    	<select name="year">
					    		<option value="nam">Year</option>
					    		<?php 
                                  for($i=1970;$i<=2019;$i++){
                                  	echo "<option value='$i'>$i</option>";
                                  }
					    		 ?>
					    	</select>
					    	
					    </td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<input type="radio" name="gender" value="1">Male
							<input type="radio" name="gender" value="2">Female
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding-left: 70px;">
							<input style="width: 70px;height: 30px;"type="submit" name="ok" value="Register">
						</td>
					</tr>
				</table>
			</form>
			<div class="error" style="width: 300px; height: 200px;margin: auto; color: red;">
				<?php
				 echo $loi['user'].'<br/>';
				 echo $loi['pass'].'<br/>'; 
				 echo $loi['email'].'<br/>';
				 echo $loi['birthday'].'<br/>';
				 echo $loi['gender'].'<br/>';
				 echo $loi['regiser'];
				 ?>
			</div>

	</div>
	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>