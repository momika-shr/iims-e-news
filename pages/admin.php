<!DOCTYPE html>
<html>
<head>
	<title>InsertNews</title>
</head>
<body>
<?php 
session_start();
include 'conn.php';
	if(isset($_SESSION['username']))
	{
		echo "Welcome"." ".$_SESSION['username'];
			if (isset($_POST['submit'])) {
				# code...
				$title=$_POST['title'];
				$news=$_POST['news'];
				$file=$_FILES['fileimg']['name'];
				$tmp_file=$_FILES['fileimg']['tmp_name'];

				if(!empty($file)){
					$location="../images/";

					if(move_uploaded_file($tmp_file,$location.$file)){
						$query="insert into tbl_news(title,news,image) values('$title','$news','$file')";
						$res=mysqli_query($conn,$query);
						if($res){
							echo "news inserted!";
						}
						else{
							echo "news insert error!!";
						}
					}
					else{
						echo "file moving failed!!";
					}
				}
				else{
					echo "failed!!";
				}
				
			}
	}

 ?>
<form method="POST" enctype="multipart/form-data">
<p>TITLE:</p>
<input type="text" name="title">
<p>Category:</p>
	<select name="catName">
		<?php 
			$query="select * from category";
			$res=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($res);
			while($res){
				?>
				<option value="<?php echo $row['id'];?>">
				<?php echo $row['category_name'];?>
				</option>

			<?php	
			}
		 ?>
	</select>
<p>News</p>
<textarea rows="10" cols="15" name="news"></textarea>
<p>Image:<input type="file" name="fileimg"></p>
<p><input type="submit" name="submit" value="SUBMIT"></p>
<a href="#">Logout</a>

</form>
</body>
</html>