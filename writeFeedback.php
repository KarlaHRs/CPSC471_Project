<thml>
	<head>
		<meta charset="UTF-8">
		<title> Write Feedback</title>
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
				<a href="#">Update Services</a>
				<a href="#">My Info</a>
				<a href="index.php">Log out</a>
			</div>
		</nav>
	</header><br><br>
        <button class="loginbutton" onclick="displayConfirmation">
        <form>
            <font size="5" color="white">
                 Day of cleaning : <input type="text" name="day"><br><br>
				 Month of cleaning: <input type="text" name="month"><br><br>
                 Year of cleaning: <input type="text" name="year"><br><br>
				 Your cleaning id: <input type="text" name="id"><br><br>
                 comment: <input type="text" name="comment"><br><br>
                <button class="loginbutton" type="submit" name="submit"><span>Submit</span></button>
            </font>
        </form>
		
		<?php
		
			if(isset($_POST['submit'])){
	
	echo ("<script LANGUAGE='JavaScript'>
          window.alert('Cells is empty: no cells must be blank');
          window.location.href='../writeFeedback.php';
		</script>");
			include("includes/db.inc.php");
		
			$day =(int)$_POST['day'];
			$month = (int)$_POST['month'];
			$year = (int)$_POST['year'];
			$comment =  $_POST['comment'];
			$id =(int)$_POST['id'];
	
	
		if(empty($day) || empty($month) || empty($year) || empty($comment) || empty($id)){
			echo ("<script LANGUAGE='JavaScript'>
          window.alert('Cells is empty: no cells must be blank');
          window.location.href='../writeFeedback.php';
		</script>");
	
		} else{
		echo ("<script LANGUAGE='JavaScript'>
          window.alert('Cells is empty: inserting');
          window.location.href='../writeFeedback.php';
		</script>");
		$sql = "INSERT into feedback (day, month, year, cleaningId, comment, adminUsername) VALUES ($day, $month, $year, $id, '$comment', 'NULL')"; 
		if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
			}
			}
		?>
    </body>
</html>
