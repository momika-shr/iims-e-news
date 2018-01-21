<!DOCTYPE html>
<html>
<head>
	<title>Login here</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bs/css/font-awesome.css">

</head>
<body>
<?php  
session_start();
include 'conn.php';
if(isset($_POST['login'])){
	
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query="select * from user_tbl where user_name='$username' and user_pass='$password'";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	if($count!=0){
		$_SESSION['username']=$username;
		echo "<script>alert('welcome')</script>";

		header('location:news.php?msg=login successful');

	}
	else{
		echo "<script>alert('please SignUp!!')</script>";
		
	}
}
?>

	<div class="left"> 
		<h1>IIMS e-News</h1>
		<p>An online news system</p>
		<img src="../images/IIMS.png">
	</div>
	
	<div class="right"> 	
			<h1 class="login">LOG IN</h1>

				<form id="LogInForm" method="POST" action="">
					<input type="Username, email" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="submit" name="login" value="LogIn">
				</form>
				<a href="signup.php"><input type="submit" name="signup" value="SignUp"></a>
				
	</div>			

</body>
</html>