<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <style>
		
		 h2
 {
     padding: 0;
     margin: 0;
 }
		
		table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

 table tr:hover {background-color: #dddddd;}

 table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}

        </style>
        <link rel="stylesheet" type="text/css" href="style2.css">
</head>
	<body>
	<header class = "navigation">
		<nav>
			<div>
				<a href="adminHomePage.php">Home</a>
				<a href="#">Update Company Info</a>
				<a href="#">View Bookings</a>
				<a href="viewResumes.php">View Resumes</a>
				<a href="#">Update Services</a>
				<ul>
					<li>
						<a href="#">Schedules</a>
						<ul>
							<li><a href="CompanySchedule.php">Company Schedule</a></li>
							<li><a href="cleaningSchedule.php">Cleaning Schedule</a></li>
						</lu>
					</li>
				</ul>
				<a href="#">My Info</a>
				<a href="information.php">Log out</a>
			</div>
		</nav>
	</header>
	<?php
	
			include("includes/db.inc.php");
			
			
			$sql="SELECT * FROM resume";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
			
				echo"<table style=width:100%><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Availability</th><th>Experience</th>&nbsp;&nbsp;&nbsp;
					<td></tr>";
				while($row = $result->fetch_assoc()){
					echo"<tr><td>".$row["id"]."</td><td>".$row["Fname"]."</td><td>".$row["Lname"]."</td><td>".$row["availability"]."</td><td>".$row["Experience"]."
					</td><td><form method=POST><button type=submit class=viewedbutton value=$row[id] name=button onclick=getID() >Mark as viewed</button></form></td></tr>";
				}
				echo "</table>";
			}else {
				echo "No resumes submitted at this time";
			}
			
			
			if(isset($_POST['button'])){
				$ID = $_POST['button'];
				$sql = "UPDATE resume SET reviewed = true WHERE id = $ID";
				$result = $conn->query($sql);
				echo ("<script LANGUAGE='JavaScript'>
				window.alert('Resume successfully marked as viewed!');
				</script>");
			}

	?>
	<script>

		
	</script>
	

	</body>
		
<html>