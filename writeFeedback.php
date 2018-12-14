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
                    <a href="customerInfo">My Info</a>
                    <a href="information.php">Log out</a>
                </div>
            </nav>
        </header><br><br>
        
            <form method="post" class="inputbox">
                <font size="4" color="black">
                Day of cleaning : <input type="text" name="day"><br><br>
                Month of cleaning: <input type="text" name="month"><br><br>
                Year of cleaning: <input type="text" name="year"><br><br>
                Your cleaning id: <input type="text" name="id"><br><br>
                <label for="frequency"> Comment: </label><br>
                <textarea id="comment" name="comment"></textarea><br><br>
                <button class="viewedbutton" type="submit" name="submit"><span>Submit</span></button>
                </font>
            </form>

            <?php
            session_start();
            if (isset($_POST['submit'])) {

                include("includes/db.inc.php");

                $day = $_POST['day'];
                $month = $_POST['month'];
                $year = $_POST['year'];
                $comment = $_POST['comment'];
                $id = $_POST['id'];
                $username = $_POST['username'];


                if (empty($day) || empty($month) || empty($year) || empty($comment) || empty($id)) {
                    echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Cells is empty: no cells must be blank');
                                window.location.href='writeFeedback.php';
                                </script>");
                } else {

                    $sql = "INSERT INTO feedback (day, month, year, cleaningId, comment, adminUsername) VALUES ('$day', '$month', '$year', '$id', '$comment', '$username')";
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
