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
            <p style="font-family:Snell Roundhand, cursive; color:Black; font-size: 17px;">Please enter the date, time and ID of employee available to work if applicable.</p>
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

        if (isset($_POST['button'])) {

            $day = $_POST['day'];
            $date = $_POST['da'];
            $av = $_POST['av'];
            $hourS = $_POST['hourS'];
            $hourE = $_POST['hourE'];
            $minS = $_POST['minuteS'];
            $minE = $_POST['minuteE'];
            $user = $_SESSION['username'];
            $essn = $_POST['essn'];

            if ($minS != 0) {
                $minS = $minS / 100;
            }
            if ($minE != 0) {
                $minE = $minE / 100;
            }
            $stime = $hourS + $minS;
            $etime = $hourE + $minE;


            if (empty($hourS) || empty($hourE) || empty($essn) || empty($av) || empty($day) || empty($date)) {
                echo ("<script LANGUAGE='JavaScript'>
                                        window.alert('All cells must be filled ');
                                        </script>");
            } else {

                $sql = "INSERT INTO companyschedule(daystring, date, starttime, endtime, availability, essn, adminusername) VALUES('$day','$date',$stime,$etime,$av,$essn,'$user')";
                if ($conn->query($sql) === TRUE) {
                    echo ("<script LANGUAGE='JavaScript'>
                                        window.alert('New record created!');
                                        </script>");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=updateSchedule.php">';
                exit;
            }
        }
        ?>

        <div>
            <center>
                <label for="start">Date:</label>
                <input type="date" placeholder="dd:mm:yy" id="myDate" min="2018-01-01" max="2018-12-31" value="<?php echo $date; ?>">
                <button onclick="myFunction()">Select</button><br><br>
            </center>
        </div>
        <form class="update" method="POST">
            Day of week: <input type="text" name='day' id="date" value="<?php echo $day; ?>" readonly="">
            <div class="custom-select" ><br>
                <label for="av">Availability: </label>
                <select name="av" id="av">
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
                <br><br>
                Start Date: <br>
                <label for="day">Hour: </label>
                <select name="hourS" id="hourS">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <label for="size">Minute: </label>
                <select name = "minuteS" id="minuteS">
                    <option value="0">0</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select><br><br><br>
                End Date: <br>
                <label for="day">Hour: </label>
                <select name = "hourE" id="hourE">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <label for="size">Minute: </label>
                <select name = "minuteE" id="minuteE">
                    <option value="0">0</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select>
                <br><br>
                ID of employee available: <input type=text name=essn><br><br>
                <input type="hidden" name='da' id="da" value="<?php echo $date; ?>">
                <button type=submit class=viewedbutton name=button>Submit</button>
            </div>
        </form>
        <?php
        $sql = "SELECT * FROM companyschedule";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            update($result);
        } else {
            echo "No available schedule at this time";
        }

        function update($result) {
            echo"<table style=width:100%><tr><th>Day of week</th><th>Date</th><th>Start Time</th><th>End time</th><th>Available</th><th>Employee Available</th>
                   </tr>";
            while ($row = $result->fetch_assoc()) {
                echo"<tr><td>" . $row["dayString"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["startTime"] . "</td><td>" . $row["endTime"] . "</td><td>" . $t = setAv($row["availability"]) . "</td><td>" . $row["essn"] . "</td></tr>";
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