<!DOCTYPE html>
<html>
    <head>
        <title>Book Cleaning</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>

    <body>
        <header class = "navigation">
            <nav>
                <div>
                    <a href="CustomerHomePage.php">Home</a>
                    <a href="writeFeedback.php">Submit Feedback</a>
                    <a href="#">View Bookings</a>
                    <a href="SubmitResume.php">Submit Resumes</a>
                    <a href="#">My Info</a>
                    <a href="HomePage.php">Log out</a>
                </div>
            </nav>
        </header>

        <div style="text-align:center">
            <p style="font-family:Snell Roundhand, cursive; color:Black; font-size: 20px;">Information last provided about your home</p>
            <br><br>
        </div>
        
        <?php
        session_start();

        include("includes/db.inc.php");
        
        $bed = $_POST['bed'];
        $bath = $_POST['bath'];
        $size = $_POST['size'];
        if($size == '0'){
            $size = "N/A";
        }
        $total .= "$" . $_POST['total'];
        $addOn = $_POST['add'];
        
        ?>
        <form class="inputbox">
            Number of bedrooms: <input type="text" value="<?php echo $bed?>" readonly style="text-align:center;">
            Number of bathrooms: <input type="text" value="<?php echo $bath?>" readonly style="text-align:center;">
            Size of your home: <input type="text" value="<?php echo $size?>" readonly style="text-align:center;">
            Add ons: <input type="text" value="<?php echo $addOn?>" readonly style="text-align:center;"><br>
            Estimated total: <input type="text" value="<?php echo $total?>" readonly style="text-align:center;">
        </form>


</body>
</html>
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

