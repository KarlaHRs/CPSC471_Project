<!doctype html>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
	<link rel="stylesheet" href="reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="styleSchedule.css"> <!-- Resource style -->
  	<link rel="stylesheet" type="text/css" href="style2.css">
	
	<title>Schedule Template | CodyHouse</title>
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
	
<div class="cd-schedule loading">
	<div class="timeline">
		<ul>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
			<li><span>17:30</span></li>
			<li><span>18:00</span></li>
		</ul>
	</div> <!-- .timeline -->

	<div class="events">
		<ul>
			<li class="events-group">
				<div class="top-info"><span>Monday</span></div>

				<ul>
					<?php
			
				include("includes/db.inc.php");
				
				$sql = "SELECT * FROM companyschedule where dayString = 'Monday'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$start = $row["startTime"];
					$end = $row["endTime"];
					
					$startString = "";
					parse($startString, $start);
					$endString = "";
					parseEnd($endString, $end);
					
					$availability = $row["availability"];
					if($availability == 1){
						$availability = "Available";
					}else{
						$availability = "Booked Cleaning";
					}
					
				echo "
					<li class='single-event' data-start='$startString' data-end='$endString' data-content='event-restorative-yoga' data-event='event-1'>
						<a href='#0'>
							<em class='event-name'>$availability</em>
						</a>
					</li>";
					}
				}
				?>
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Tuesday</span></div>

				<ul>
				<?php
			
				include("includes/db.inc.php");
				
				$sql = "SELECT * FROM companyschedule where dayString = 'Tuesday'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$start = $row["startTime"];
					$end = $row["endTime"];
					
					$startString = "";
					parse($startString, $start);
					$endString = "";
					parseEnd($endString, $end);
					
					$availability = $row["availability"];
					if($availability == 1){
						$availability = "Available";
					}else{
						$availability = "Booked Cleaning";
					}
					
				echo "
					<li class='single-event' data-start='$startString' data-end='$endString' data-content='event-restorative-yoga' data-event='event-4'>
						<a href='#0'>
							<em class='event-name'>$availability</em>
						</a>
					</li>";
					}
				}
				
				
			?>
		</li>
		</ul>
			
			<li class="events-group">
				<div class="top-info"><span>Wednesday</span></div>
				<ul>
			
			<?php
			
				include("includes/db.inc.php");
				
				$sql = "SELECT * FROM companyschedule where dayString = 'Wednesday'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$start = $row["startTime"];
					$end = $row["endTime"];
					
					$startString = "";
					parse($startString, $start);
					$endString = "";
					parseEnd($endString, $end);
					
					$availability = $row["availability"];
					if($availability == 1){
						$availability = "Available";
					}else{
						$availability = "Booked Cleaning";
					}
					
				echo "
					<li class='single-event' data-start='$startString' data-end='$endString' data-content='event-restorative-yoga' data-event='event-4'>
						<a href='#0'>
							<em class='event-name'>$availability</em>
						</a>
					</li>";
					}
				}
				
				function parse(&$startString, $time){
					$first  = floor($time/1);
					$firstString = (string)$first;
					$second = ($time-$first)*100;
					$secondString = (string)$second;
					if($first < 10){
					$startString .= "0".(string)$first .':'  .(string)$second;
					}else{
						//$startString = '0"'.$firstString.'":';
						$startString .= (string)$first .':'  .(string)$second;
					}
				}
				
					function parseEnd(&$endTime, $time){
					$first  = floor($time/1);
					$firstString = (string)$first;
					$second = ($time-$first)*100;
					$secondString = (string)$second;
					if($first < 10){
					$endTime .= "0".(string)$first .':'  .(string)$second;
					}else{
						//$startString = '0"'.$firstString.'":';
						$endTime .= (string)$first .':'  .(string)$second;
					}
				}
				
				
			?>
		</li>
		</ul>
		
		<li class="events-group">
				<div class="top-info"><span>Thursday</span></div>

				<ul>
				<?php
			
				include("includes/db.inc.php");
				
				$sql = "SELECT * FROM companyschedule WHERE dayString = 'Thursday' and ";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$start = $row["startTime"];
					$end = $row["endTime"];
					
					$startString = "";
					parse($startString, $start);
					$endString = "";
					parseEnd($endString, $end);
					
					$availability = $row["availability"];
					if($availability == 1){
						$availability = "Available";
					}else{
						$availability = "Booked Cleaning";
					}
					
				echo "
					<li class='single-event' data-start='$startString' data-end='$endString' data-content='event-restorative-yoga' data-event='event-4'>
						<a href='#0'>
							<em class='event-name'>$availability</em>
						</a>
					</li>";
					}
				}
				
				
			?>
		</li>
		</ul>

			<li class="events-group">
				<div class="top-info"><span>Friday</span></div>

				<ul>
					<?php
			
				include("includes/db.inc.php");
				
				$sql = "SELECT * FROM companyschedule where dayString = 'Friday'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$start = $row["startTime"];
					$end = $row["endTime"];
					
					$startString = "";
					parse($startString, $start);
					$endString = "";
					parseEnd($endString, $end);
					
					$availability = $row["availability"];
					if($availability == 1){
						$availability = "Available";
					}else{
						$availability = "Booked Cleaning";
					}
					
				echo "
					<li class='single-event' data-start='$startString' data-end='$endString' data-content='event-restorative-yoga' data-event='event-4'>
						<a href='#0'>
							<em class='event-name'>$availability</em>
						</a>
					</li>";
					}
				}
				
				
			?>
				</ul>
			</li>
		</ul>
	</div>

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script src="js/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->


<
</body>
</html>