<?php
	
session_start();
	
if(isset($_POST['submit'])){
	
	include 'db.inc.php';
		
	$username = mysqli_real_escape_string($conn, $_POST['user']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	
	if(empty($username) || empty($pwd)){
		echo ("<script LANGUAGE='JavaScript'>
          window.alert('Cells is empty: Must input username/password');
          window.location.href='../LoginPage.php';
		</script>");
	
	} else{
		$sql = "SELECT * FROM Customer WHERE username='$username'
					UNION
					SELECT * FROM Admin WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = $result->num_rows;
		if($resultCheck < 1) {
			echo ("<script LANGUAGE='JavaScript'>
          window.alert('Username entered does not exist');
          window.location.href='../LoginPage.php';
		</script>");
		} else{
			if($row = $result->fetch_assoc()){
				if($pwd == $row['password']){
					$hashedPwdCheck = true;
			}else{
					$hashedPwdCheck = false;
			}
				if($hashedPwdCheck == false){
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Wrong password');
					window.location.href='../LoginPage.php';
					</script>");
					exit();
				} else if($hashedPwdCheck == true){
					if($row['isAdmin'] == true){
						$_SESSION['username'] = $row['username'];
						header("Location: ../adminHomePage.php");
					}
					else{
						$_SESSION['username'] = $row['username'];
						header("Location: ../CustomerHomePage.php");
					}
				}
			}
		}
	}
} else {
	header("Location: ../LoginPage.php?login =error");
	exit();
}

