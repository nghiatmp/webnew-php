<?php 
	require('templates/header.php');
 ?>
	<div class="table">
		<table>
			<tr>
				<td colspan="3" rowspan="" headers=""></td>
				<td colspan="2" ><a href="add_artcle.php" title="">Thêm bài viết</a></td>
			</tr>
			<tr style="color: #EC0E23">
					<td style="width: 5%;">STT</td>
					<td style="width: 15%;">Chuyên Mục</td>
					<td style="width: 60%;">Tực đề bài viết</td>
					<td style="width: 10%;">Edit</td>
				 	<td style="width: 10%;">Delete</td>
			</tr>
			<?php 

				$conn = new mysqli('localhost','root','','firstweb');
				$sql= "SELECT a.new_id ,b.cate_title,a.title from news as a ,category as b where a.cate_id=b.cate_id order by b.cate_id asc ";
				$query=mysqli_query($conn,$sql);			
				$stt=1;
				while ($row=mysqli_fetch_assoc($query)) {
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>$row[cate_title]</td>";
					echo "<td>$row[title]</td>";
					echo "<td><a href='edit_artcle.php?id=$row[new_id]'>Edit</a></td>";
					echo "<td><a href='del_artcle.php?id=$row[new_id]' onclick='show_confirm();'>Delete</a></td>";
					$stt++;
				}
				
			 ?> 

			
					
					
					
					

			</tr> 
			<!-- <tr>
					<td>2</td>
					<td>Sơn Tùng MTP và Hãy Trao Cho Anh</td>
					<td><a href="">Edit</a></td>
					<td><a href="" title="">Delete</a></td>

			</tr>
			<tr>
					<td>3</td>
					<td>Sơn Tùng MTP và Hãy Trao Cho Anh</td>
					<td><a href="">Edit</a></td>
					<td><a href="" title="">Delete</a></td>

			</tr>   -->
		</table>
	</div>
	<?php 
		require('templates/footer.php');
	 ?>
</body>
</html>