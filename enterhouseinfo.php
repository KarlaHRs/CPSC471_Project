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