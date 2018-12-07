<?php
	
session_start();
	
if(isset($_POST['submit'])){
	
	include 'db.inc.php';
	include('myjavascript.php');
		
	$username = mysqli_real_escape_string($conn, $_POST['user']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	echo "color is " . $username ." <br>";
	
	if(empty($username) || empty($pwd)){
		header("Location: ../LoginPage.php?login=empty");
		alert("empy"); 
	} else{
		$sql = "SELECT * FROM Customer WHERE username='$username'
					UNION
					SELECT * FROM Admin WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = $result->num_rows;
		if($resultCheck < 1) {
			echo $resultCheck;
			header("Location: ../LoginPage.php?login=error in result check");
			alert("Wrong username or password");
			exit();
		} else{
			if($row = $result->fetch_assoc()){
				//alert($username);
				//if($pwd == $row['password']){
					//$hashedPwdCheck = true;
			//}else{
					//$hashedPwdCheck = false;
				//}
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				
				echo "<script type='text/javascript'>alert('$hashedPwdCheck');</script>";
				
				if($hashedPwdCheck == false){
					header("Location: ../LoginPage.php?login=errormatch");
					if(isset($_GET['login'])){
						echo "<script type='text/javascript'>alert('$hashedPwdCheck');</script>";
					}
					//alert("Wrong username or password");
					exit();
				} else if($hashedPwdCheck == true){
				//	$fieldinfo=mysqli_fetch_field($result);
					
					echo "<script type='text/javascript'>alert('$msg');</script>";
					header("Location: ../test.php?login =success");
					$_SESSION['u_id'] = $row['username'];
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../LoginPage.php?login =errorin else");
	//alert("login success");
	exit();
}

function alert($msg){
	echo "<script type='text/javascript'>alert("'.$msg.'");</script>";
}
