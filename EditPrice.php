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
        <?php
        include("includes/db.inc.php");
        
        function update($result) {
            echo"<table style=width:100%><tr><th>ID</th><th>Feature Name</th><th>Current Price</th>&nbsp;&nbsp;&nbsp;
                    <td></tr>";
            while ($row = $result->fetch_assoc()) {
                echo"<tr><td>" . $row["id"] . "</td><td>" . $row["featureName"] . "</td><td>" . $row["price"] . "</td><td><form method=POST>New Price: <input type=text name=NewPrice>"
                . "<button type=submit class=viewedbutton value=$row[id] name=button>Update Price</button> New Name: <input type=text name=NewName>"
                . "<button type=submit class=viewedbutton value=$row[id] name=name>Update Name</button></form></td></tr>";
            }
            echo "</table>";
        }

        $sql = "SELECT * FROM priceCategory";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            update($result);
        } else {
            echo "No price list available at this time";
        }

        if (isset($_POST['button']) || isset($_POST['NewName'])) {
            if (isset($_POST['button'])) {
                $newPrice = $_POST['NewPrice'];
                $ID = $_POST['button'];
                $sql = "UPDATE priceCategory SET price = $newPrice  WHERE id = $ID";
                $result = $conn->query($sql);
               
              
            } else if(isset($_POST['name'])) {
                $newName = $_POST['NewName'];
                $ID = $_POST['name'];
                $sql = "UPDATE priceCategory SET featureName = '$newName'  WHERE id = $ID";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                   
                }
            }
            
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=EditPrice.php">';    
            exit;
        }
       ?>
    </body>
</html>