<?php  
		require('templates/header.php');
 ?>
		<div class="subcate">
			<form> 
                 <table>
                 		<tr>
                 				<td colspan="3"></td>
                 				<td colspan="2"><a href="add_subcategory.php" title="">Thêm chuyên mục con</a></td>

                 		</tr> 
						<tr style="color: red;">
							<td style="width: 10%">STT</td>
							<td style="width: 35%">Chuyên Mục Cha</td>
							<td style="width: 35%">Chuyên Mục Con</td>
							<td style="width: 10%">Edit</td> 
							<td style="width: 10%">Delete</td>
						</tr>
						<?php 
							$conn = new mysqli('localhost','root','','firstweb');
							$sql="SELECT a.cate_title ,b.sub_title,b.cate_id ,b.sub_id from category as a ,subcategory as b where a.cate_id=b.cate_id";
							$query=mysqli_query($conn,$sql);
							$stt=1;
							while ($row=mysqli_fetch_assoc($query)) {
								echo "<tr>";
									echo "<td >$stt</td>";
									echo "<td >$row[cate_title]</td>";
									echo "<td >$row[sub_title]</td>";
									echo "<td ><a href='edit_subcategory.php?id=$row[sub_id]' >Edit</a></td> ";
									echo "<td ><a href='del_subcategory.php?id=$row[sub_id]' onclick='show_confirm();'>Delete</a></td>";
									$stt++;
								echo "</tr>";
							}
							$conn->close();

						 ?>
						
						

                 </table>
			</form>
		</div>	
 <?php  
 		require('templates/footer.php');
  ?>