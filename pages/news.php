<!DOCTYPE html>
<html>
<head>
	<title>display news</title>
	<link rel="stylesheet" type="text/css" href="../css/news.css">
</head>
<body>
<center>
<header>
	<div class="logo">
		<a href="news.html"><img src="../images/IIMS.png"></a>
	</div>
	<h1>IIMS e-NEWS</h1>
	<ul id="list">
	<li>
	<a href="form.php">Add News</a></li>
	<li><a href="logout.php">Log Out</a></li>
	
	</ul>

<!-- 	<nav class="newsNav">
		<ul>
			<li><a href="">CONTACT</a></li>
		</ul>
	</nav>	 -->
</header>

<main>	
<?php $mysqli = new mysqli("localhost","root","","iimsnews"); 
$sql = "select * from news_tbl";
$res = $mysqli->query($sql);
while($row = $res->fetch_array(MYSQLI_ASSOC)):
	//var_dump($row);
?>
	<section class="post">

		<div class="title" name=title>
			<h2 name="heading"><?php echo $row['title'];?></h2>
		</div>

		<div class="image">
			 <img src="../images/<?php echo $row['image']?>" name="image"> 
			
 		</div>
		
		<div class="content">
			<p name="news"><?php echo $row['news'];?></p>
		</div>	
		

	</section>
<?php endwhile;	?>
</main>

</center>
</body>
</html>