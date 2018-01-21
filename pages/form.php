
<!DOCTYPE html>
<html>
<head>
	<title>InsertNews</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php 
session_start();
include 'conn.php';
	if(isset($_SESSION['username']))
	{
		echo "<p class='userName'> Welcome ".$_SESSION['username']."</p>";
			if (isset($_POST['upload'])) {
				# code...
				$title=$_POST['title'];
				$news=$_POST['news'];
				$catName=$_POST['catName'];
				$file=$_FILES['fileimg']['name'];
				$tmp_file=$_FILES['fileimg']['tmp_name'];

				if(!empty($file)){
					$location="../images/";

					if(move_uploaded_file($tmp_file,$location.$file)){

						$query="insert into news_tbl(title,news,image,category) values('$title','$news','$file','$catName')";
						$res=mysqli_query($conn,$query);
						if($res){
							echo "<script>alert('news inserted!')</script>";
						}
						else{
							echo "<script>alert('news insert error!!'')</script>";
						}
					}
					else{
						echo "<script>alert('file moving failed!!')</script>";
					}
				}
				else{
					echo "<script>alert('choose a file!!')</script>";
				}
				
			}
	}

 ?>
<form method="POST" enctype="multipart/form-data" id="upload">
<h2>Add News</h2>
<img src="../images/admin.png">
<p>TITLE</p>
<input type="text" name="title">
<p>Category</p>
	<select name="catName">
		<option>sports</option>
		<option>music</option>
		<option>extra curicular</option>
		<option>academics</option>
	</select>
<p>News</p>
<textarea rows="5" cols="50" name="news"></textarea>
<p>Image<input type="file" name="fileimg"></p>
<p><input type="submit" name="upload" value="UPLOAD"></p>
<a href="login.php" class="logout">logout</a>
 `<!-- <button name="logout">LogOut</button> -->
   
</form>
</body>
</html>