<?php 
	require('templates/header.php');
 ?>
	<div class="table">
		<table>
			<thead>
				<tr style="color: #EC0E23">
					<td style="width: 5%">STT</td>
					<td style="width: 15%">UserNam</td>
					<td style="width: 45%">Message</td>
					<td style="width: 8%">Link</td>
					<td style="width: 17%">Duyệt</td>
					<td style="width: 10%">Delete</td>
				</tr>
			</thead>
			<tbody>
				<?php 

					$conn = new mysqli('localhost','root','','firstweb');
					$sql1="SELECT * FROM comment";
					$query1=mysqli_query($conn,$sql1);
					$stt=1;
					while ($row=mysqli_fetch_assoc($query1)) {
						echo "<tr>";
						echo "<td>$stt</td>";
						echo "<td>$row[name]</td>";
						echo "<td>$row[message]</td>";

						echo "<td><a href='../detail.php?id=$row[new_id]'>Xem</a></td>";
						if($row['cm_check']=='N'){
							echo "<td><a href='edit_comment.php?id=$row[cm_id]'>Chưa kiểm duyệt</a></td>";
						}else{
							echo "<td><a href='edit_comment.php?id=$row[cm_id]'>Đã kiểm duyệt</a></td>";
						}
						
						echo "<td><a href='del_comment.php?id=$row[cm_id] ' onclick='show_confirm();'>Delete</a></td>";
						$stt++;
						echo "</tr>";
						
					}
					$conn->close();
				 ?>
				
					
					
					
					
					
				 

				<!-- <tr>
					<td>2</td>
					<td>Nghia</td>
					<td>Hãy Trao Cho Anh</td>
					<td><a href="" title="">Xem</a></td>
					<td><a href="" title="">False</a></td>
					<td><a href="" title="">Delete</a></td>

				</tr>  -->
			</tbody>
		</table>
	</div>
	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>