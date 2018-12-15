<thml>
    <head>
        <meta charset="UTF-8">
        <title> Submit Resume</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
        <header class = "navigation">
            <nav>
                <div>
                    <a href="CustomerHomePage.php">Home</a>
                    <a href="getEstimate.php">Book Cleaning</a>
                    <a href="writeFeedback.php">Submit Feedback</a>
                    <a href="#">View Bookings</a>
                    <a href="SubmitResume.php">Submit Resumes</a>
                    <a href="customerInfo.php">My Info</a>
                    <a href="information.php">Log out</a>
                </div>
            </nav>
        </header><br><br>

        <form method="post" class="inputbox">
            <font size="4" color="black">
            Fname : <input type="text" name="Fname"><br><br>
            Lname: <input type="text" name="Lname"><br><br>
            Phonenumber: <input type="text" name="phonenumber"><br><br>
            Availability: <input type="text" name="availability"><br><br>
            Skills: <input type="text" name="skills"><br><br>
            Experince: </label><br>
            <textarea id="comment" name="experience"></textarea><br><br>
            <button class="viewedbutton" type="submit" name="submit"><span>Submit</span></button>
            </font>
        </form>

        <?php
        session_start();
        if (isset($_POST['submit'])) {

            include("includes/db.inc.php");

            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $phonenumber = $_POST['phonenumber'];
            $availability = $_POST['availability'];
            $skills = $_POST['skills'];

            $experience = $_POST['experience'];


            if (empty($Fname) || empty($Lname) || empty($phonenumber) || empty($experience) || empty($availability) || empty($skills)) {
                echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Cells is empty: no cells must be blank');
                                window.location.href='SubmitResume.php';
                                </script>");
            } else {

                $sql = "INSERT INTO feedback (Fname, Lname, phonenumber, experience, availability, skills) VALUES ('$Fname', '$Lname', '$phonenumber', '$experience', '$availability', '$skills')";
                if ($conn->query($sql)) {
                    echo "Records added successfully.";
                } else {
                    echo "ERROR: Could not able to execute $sql. ";
                }
            }
        }
        ?>
    </body>
</html>
