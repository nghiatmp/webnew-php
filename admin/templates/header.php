<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>user</title>
	<link rel="stylesheet" href="styleadmin.css">
	<script type="text/javascript">
		function show_confirm(){
			// id(confirm("Bạn có muốn xóa dòng dữ liệu này không")){
			// 	return true;
			// }else{
			// 	return false;
			// } 
			confirm("Bạn có muốn xóa dòng dữ liệu này không");
		}
	</script>
	<script src="library/ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
	<header class="">
		<h3>Welcome Admin,(<a href="../LogOut.php">LogOut</a>)</h3>
	</header>
	<div class="menu">
		<ul>
			<li><a href="list_user.php" >Quản lý thành viên</a></li>
			<li><a href="list_category.php" >Quản lý chuyên mục</a></li>
			<li><a href="list_subcategory.php" >Quản lý chuyên mục con</a></li>
			<li><a href="list_article.php" >Quản lý bài viết</a></li>
			<li><a href="list_comment.php" >Quản lý bình luận</a></li>
		</ul>
	</div>