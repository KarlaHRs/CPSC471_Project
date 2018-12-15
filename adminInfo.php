<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
	<header class = "navigation">
		<nav>
			<div>
				<a href="adminHomePage.php">Home</a>
				<a href="#">Update Company Info</a>
				<a href="viewResumes.php">View Resumes</a>
                               
                                <ul>
                                    <li>
                                        <a href="#">Update Services</a>
                                        <ul>
                                            <li><a href="EditPrice.php">Update Prices</a></li>
                                            <li><a href="AddPrice.php">Add New Features</a></li>
                                        </ul>
					</li>
				</ul>
				<ul>
                                    <li>
					<a href="#">Schedules</a>
                                        <ul>
                                            <li><a href="CompanySchedule.php">Company Schedule</a></li>
                                            <li><a href="cleaningSchedule.php">Cleaning Schedule</a></li>
                                        </ul>
                                    </li>
				</ul>
				<a href="adminInfo.php">My Info</a>
				<a href="homePage.php">Log out</a>
			</div>
		</nav>
	</header>

</html>
           <form method="post" class="inputbox">
                <font size="4" color="black">
                Fname: <input type="text" name="Fname"><br><br>
                Lname: <input type="text" name="Lname"><br><br>
                Password: <input type="text" name="password"><br><br>
                Email: <input type="text" name="email"><br><br>
                <button class="viewedbutton" type="submit" name="submit"><span>Submit</span></button>
                </font>
            </form>
			
			
			<?php
            session_start();
            if (isset($_POST['submit'])) {

                include("includes/db.inc.php");
                $username = $_POST['username'];
                $password = $_POST['password'];
                $Fname = $_POST['Fname'];
                $Lname = $_POST['Lname'];
				$email = $_POST['email'];

				
				 $sql = "UPDATE customer SET (Fname = 'Fname', Lname = 'Lname',  password = 'password',email = 'email'
	         WHERE username = 'username'";
                    if ($conn->query($sql)) {
                        echo "Infomation changed successfully.";
                    } else {
                        echo "ERROR: Could not able to execute $sql. ";
                    }
					
			}
		    ?>
    </body>
</html>