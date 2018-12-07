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
				<center>
					<h1> <font  size = "5">User Authentication</font> </h1>
					<div class= "imgcontainer">
						<img src="user.png" alt="Avatar" class="avatar">
					</div>
					<p>Username</p>
					<input type="text" name="user" maxlength ="10" " placeholder="Enter Username">
					<p>Password</p>
					<input type="password" name="pwd" maxlength="15" placeholder="Enter password">
					<br>
					<button  type="submit" name="submit">Login</button>
				</center>
				</form>
				
		</div>
	</nav>
</header>

<section>

</section>


</body>
</html>