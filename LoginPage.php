<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
				
				<form class= "loginbox" action = "includes/login.inc.php" method="POST">
				<center><br>
					<h1> <font  size = "5">User Authentication</font> </h1>
					<div class= "imgcontainer">
						<img src="user.png" alt="Avatar" class="avatar"><br><br>
					</div>
					<p>Username</p><br>
					<input type="text" name="user" maxlength ="10" " placeholder="Enter Username"><br><br>
					<p>Password</p><br>
					<input type="password" name="pwd" maxlength="15" placeholder="Enter password">
					<br><br><br>
					<button  class = "loginbutton" type="submit" name="submit">Login</button>
				</center>
				</form>
				
		</div>
	</nav>
</header>

<section>

</section>


</body>
</html>