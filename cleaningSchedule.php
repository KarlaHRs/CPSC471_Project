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
                    <a href="adminInfo.php">My Info</a>
                    <a href="homePage.php">Log out</a>
                </div>
            </nav>
        </header>
        <br><br>
        <div style="text-align:center">
            <p style="font-family:Snell Roundhand, cursive; color:Black; font-size: 17px;">Currently Scheduled Cleanings.</p>
            <br<br<br><br>
        </div>

        <?php
        include("includes/db.inc.php");
        if (!isset($_SESSION)) {
            session_start();
        }

        function setAv($a) {
            if ($a == '1') {
                return "available";
            } else {
                return "unavailable";
            }
        }

        ?>

        <?php
        $sql = "SELECT * FROM cleaningschedule";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            update($result);
        } else {
            echo "No available schedule at this time";
        }

        function update($result) {
            echo"<table style=width:100%><tr><th>Date</th><th>Start Time</th><th>Customer ID</th><th> Cleaning ID</th>
                   </tr>";
            while ($row = $result->fetch_assoc()) {
                echo"<tr><td>" . $row["Date"] . "</td><td>" . $row["startTime"] . "</td><td>" . $row["CUsername"] . "</td><td>" . $row["cleaningId"] . "</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </body>

    <script>
        function myFunction() {
            var input = document.getElementById("myDate").value;
            var date = new Date(input).getUTCDay();

            var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            var day = weekday[date];

            document.getElementById("date").value = day;
            document.getElementById("da").value = input;
        }
    </script>
</html>