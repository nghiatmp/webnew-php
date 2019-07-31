<?php 
	require('templates/header.php');
 ?>
	<div class="table">
		<table>
			<thead>
				<tr style="color: #EC0E23">
					<td>STT</td>
					<td>UserName</td>
					<td>Email</td>
					<td>Level</td>
					<td>Delete</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				//mo ket noi
				$conn = new mysqli('localhost','root','','firstweb');
				$sql='SELECT user_id ,username,email,level from user ORDER BY level DESC ';
				$query=mysqli_query($conn,$sql);
				$stt=1;
				
				while ($result = mysqli_fetch_assoc($query)){
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>$result[username]</td>";
					echo "<td>$result[email]</td>";
					if($result['level']==1){
						echo "<td>Thành Viên</td>";
					}else{
						echo "<td>Admin</td>";
					}	
					echo "<td><a href='del_user.php?id=$result[user_id]' onclick= 'return show_confirm();'>Delete</a></td>";

				echo "</tr>";
				$stt++;
				}
				$conn->close();
			 ?>
			</tbody>
		</table>
	</div>
	<?php 
		require('templates/footer.php');
	 ?>


	 
</body>
</html>