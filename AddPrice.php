<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Current Price List</title>
        <style>
h2{
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
				<a href="#">My Info</a>
				<a href="homePage.php">Log out</a>
			</div>
		</nav>
	</header>
            <br><br>
            <div style="text-align:center">
            <p style="font-family:Snell Roundhand, cursive; color:Black; font-size: 20px;">Please enter name and price of new service.</p>
            </div>
           <form class="inputbox" method="POST">
               <div>
              <label for="featureName">Name</label>
              <input type="text" id="fname" name="name"><br>
              <label for="price">Price</label>
              <input type="text" id="price" name="price"><br>
              <button type=submit class=viewedbutton name=button>Submit</button>
              </div>
           </form>
            
            
	<?php
        
            session_start();
        
            function update($result){
                   echo"<table style=width:100%><tr><th>ID</th><th>Feature Name</th><th>Current Price</th>&nbsp;&nbsp;&nbsp;
                   </tr>";
                while($row = $result->fetch_assoc()){
                    echo"<tr><td>".$row["id"]."</td><td>".$row["featureName"]."</td><td>".$row["price"]."</td></tr>";
                }
                echo "</table>";
                
            }
        
            include("includes/db.inc.php");
			
			
            $sql="SELECT * FROM priceCategory";
            $result = $conn->query($sql);
            if($result->num_rows > 0){	
                update($result);
            }else {
		echo "No price list available at this time";
            }
			if(isset($_POST['button'])){
                            $feature = $_POST['name'];
                            $price = $_POST['price'];
                            $admin = $_SESSION['username'];
                            
            
                            if(empty($feature) || empty($price)){
                                echo ("<script LANGUAGE='JavaScript'>
                                        window.alert('Cells is empty: Must input feature name/price');
                                        window.location.href='../AddPrice.php';
                                        </script>");
	
                            }else{ 
                 
				$sql = "INSERT INTO priceCategory(featurename, price, adminID) VALUES('$feature', $price, '$admin')";
				if ($conn->query($sql) === TRUE) {
                                    echo ("<script LANGUAGE='JavaScript'>
                                        window.alert('New record created!');
                                        </script>");
                                } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                header('Refresh: 0');
                            }
                        }
                   

	?>

	

	</body>
		
<html>