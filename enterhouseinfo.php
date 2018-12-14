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
        if ($size == '0') {
            $size = "N/A";
        }
        $total .= "$" . $_POST['total'];
        $addOn = $_POST['add'];
        $array = $_SESSION['array_name'];
        if (isset($_POST['submit'])) {

            $bed = $_POST['bed'];
            $bath = $_POST['bath'];
            $size = $_POST['size'];
            $zipcode = mysqli_real_escape_string($conn, $_POST['zip']);
            $houseno = mysqli_real_escape_string($conn, $_POST['houseno']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $Cusername = $_SESSION['username'];
            $frequency = $_POST['frequency'];

            if (isset($_POST['textarea']) && $_POST['textarea'] != '') {
                $comment = $_POST['comment'];
            } else {
                $comment = "N/A";
            }

            if (empty($zipcode) || empty($houseno) || empty($address)) {
                header("Location: ../enterhouseinfo.php?error=emptyfields");
                exit();
            } else {
                $sql = "INSERT into cleaninglocation values('$zipcode', $houseno, $bed, $bath, '$address', '$size', '$Cusername')";
                if ($conn->query($sql) === TRUE) {
                    echo ("<script LANGUAGE='JavaScript'>
              window.alert('New record created!');
              </script>");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $sql = "INSERT INTO cleaning(frequency, request, CUsername) VALUES ('$frequency', '$comment', '$Cusername')";
            if ($conn->query($sql) === TRUE) {
                $cleaningID = $conn->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            foreach ($array as $item) {
                $sql = "INSERT INTO serviceType(service, cleaningId) VALUES ('$item', $cleaningID)";
                if ($conn->query($sql) === TRUE) {
                    echo ("<script LANGUAGE='JavaScript'>
              window.alert('New record created!');
              </script>");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        ?>
        <form class="inputbox" method="POST">
            Number of bedrooms: <input type="text" name="bed" value="<?php echo $bed ?>" readonly style="text-align:center;">
            Number of bathrooms: <input type="text" name="bath" value="<?php echo $bath ?>" readonly style="text-align:center;">
            Size of your home: <input type="text" name="size" value="<?php echo $size ?>" readonly style="text-align:center;">
            Add ons: <input type="text" value="<?php echo $addOn ?>" readonly style="text-align:center;"><br>
            Estimated total: <input type="text" value="<?php echo $total ?>" readonly style="text-align:center;">


            <br><br>

            *Zip Code: <input type="text" id="zip" name="zip"><br>
            *House No: <input type="text" id="number" name="houseno"><br>
            *Address: <input type="text" id="address" name="address"><br>
            *<label for="frequency">Frequency of cleaning: </label>
            <select name = "frequency" id="frequency">
                <option value="Weekly">Weekly</option>
                <option value="Bi-weekly">Bi-weekly</option>
                <option value="Monthly">Monthly</option>
                <option value="One-time">One-time</option>
            </select><br><br><br>
            <label for="frequency">Special instructions/requests: </label><br><br>
            <textarea id="comment" name="comment"></textarea>

            <button type=submit class=viewedbutton name=submit>Submit</button>
        </form>

    </body>
</html>

