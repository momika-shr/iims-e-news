
<!DOCTYPE html>
<html>
<head>
	<title>Signup here</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
</head>
<body >
 <?php include 'conn.php';
if (isset($_POST['signup'])){
	# code...
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];

	if($repassword!=$password){
		echo "<script>
			alert('password mismatch!!');
			</script>";
		}

	else{
	$query="select * from register where username='$username'";
	
	
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	if($count==0){
	$query="insert into register_tbl(username,email,password) values('$username','$email','$password')";
		if(mysqli_query($conn,$query)){

			?>
			<script>
			alert('inserted into data base');
			document.location.href="news.php";
			</script>
			<?php
			}

		else{
			echo "error";
			}
		}

		else{
			echo "<script>alert('data already exist')</script>";
		}	
	}
}
		
?>


<!--php ends--> 
<!--html part-->
	<div class="formFill">
		<img id="signupimg" src="../images/IIMS.png" alt="Logo of iims">
		<h1 class="signupContent">IIMS e-News Registration</h1>
		<form id="SignUpForm" method="POST" action="">
			<input type="text" name="username" placeholder="Username" required="">
			<input type="email" name="email" placeholder="Email" required="">
			<input type="password" name="password" placeholder="Password" required="">
			<input type="password" name="repassword" placeholder="Retype-Password" required="">
			<input type="submit" name="signup" value="SignUp">		
		</form>
	</div>	
</body>
</html>