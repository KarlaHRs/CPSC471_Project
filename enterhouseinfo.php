<html>
<head>
	
	</head>
	
		<header class = "navigation">
		<nav>
			<div>
				<a href="adminHomePage.php">Home</a>
				<a href="/includes/db.inc.php">Update Company Info</a>
				<a href="#">View Bookings</a>
				<a href="viewResumes.php">View Resumes</a>
				<a href="#">Update Services</a>
				<ul>
					<li>
						<a href="#">Schedules</a>
						<ul>
							<li><a href="#">Company Schedule</a></li>
							<li><a href="#">Cleaning Schedule</a></li>
						</lu>
					</li>
				</ul>
				<a href="#">My Info</a>
				<a href="index.php">Log out</a>
			</div>
		</nav>
	</header>
	
	<form 
<?php
	
if(isset($_POST['submit'])){
	
	include 'db.inc.php';
	
	$zipcode = mysqli_real_escape_string($conn, $_POST['zip']);
	$houseno = mysqli_real_escape_string($conn, $_POST['houseno']);
	$bed = mysqli_real_escape_string($conn, $_POST['bed']);
	$bath = mysqli_real_escape_string($conn, $_POST['bath']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$size = mysqli_real_escape_string($conn, $_POST['size']);
	
	if(empty($zipcode) || empty($houseno) || empty($bed) || empty($bath) || empty($address) || empty($size)){
		header("Location: ../estimate.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "INSERT into cleaninglocation values('$zipcode', $houseno', '$bedrooms', '$bathroom', '$address', '$size', '$Cusername')";
	}
	
}
?>

</html>