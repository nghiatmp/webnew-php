<?php 
	require('templates/header.php');
 ?>
	<div class="table">
		<table>
			<tr >
				<td colspan="3" rowspan="" headers=""></td>
				<td colspan="1" ><a href="add_category.php" title="">Thêm chuyên Mục</a></td>
			</tr>
			<tr style="color: #EC0E23">
					<td style="width: 10%;">STT</td>
					<td style="width: 50%;">Chuyên Mục</td>
					<td style="width: 20%;">Edit</td>
				 	<td style="width: 20%;">Delete</td>
			<?php

				$conn = new mysqli('localhost','root','','firstweb');
				$sql="SELECT cate_id, cate_title FROM category";
				$result=mysqli_query($conn,$sql);

				$stt=1;
				while ($query=mysqli_fetch_assoc($result)){
				 	echo "<tr>";
						echo "<td>$stt</td>";
						echo "<td>$query[cate_title]</td>";
						echo "<td><a href='edit_category.php?id=$query[cate_id]'>Edit</a></td>";
						echo "<td><a href='del_category.php?id=$query[cate_id] ' onclick='show_confirm()'>Delete</a></td>";

					echo "</tr> ";
					$stt++;
				 } 
				

			 ?>
			
		</table>
	</div>
	<?php 

		require('templates/footer.php');
	 ?>
</body>
</html>