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
            <p style="font-family:Snell Roundhand, cursive; color:Black; font-size: 20px;">Please enter the necessary information below to get an estimate</p>
            <br><br>
        </div>
        <form class="inputbox" method="POST">
            <div class="custom-select" ><br>
                <label for="price">Number of Bedrooms: </label>
                <select name = "bedroom" id="bedroom">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select><br><br>
                <label for="bathroom">Number of Bathrooms: </label>
                <select name = "bathroom" id="bathroom">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <label for="size">Size of house: </label>
                <select name = "size" id="size">
                    <option value="1">up to 600</option>
                    <option value="2">601-800</option>
                    <option value="3">801-1000</option>
                    <option value="4">1001-1200</option>
                    <option value="5">1201-1400</option>
                    <option value="6">1401-1600</option>
                </select>
                <br><br>
                <p style="font-size: 18px ">Add Ons:</p>
                <br>
                <div id="boxes">
                    <input type="checkbox" id="add" name="add[]" value="fridge">
                    <label for="fridge">Inside fridge</label>
                    <br><br>
                    <input type="checkbox" id="add" name="add[]" value="oven">
                    <label for="oven">Oven</label>
                    <br><br>
                    <input type="checkbox" id="add" name="add[]" value="windows">
                    <label for="window">Inside Windows</label>
                </div>
                <center>
                    <br><br>
                    <button type=submit class=viewedbutton name=button>Submit</button>
                </center>
            </div>
        </form>

        <?php
        session_start();

        include("includes/db.inc.php");

        if (isset($_POST['button'])) {
            $addOn = $_POST['add'];
            $bed = $_POST['bedroom'];
            $bath = $_POST['bathroom'];
            $size = $_POST['size'];
            $customer = $_SESSION['username'];
            $dataString = serialize($addOn);

            $sql = "SELECT price FROM priceCategory WHERE featureName = 'bedroom'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $price = $row["price"];
                }
                $pbed = $price * $bed;
            }
            $sql = "SELECT price FROM priceCategory WHERE featureName = 'bathroom'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $price = $row["price"];
                }
                $pbath = $price * $bath;
            }
            $s;
            $s2;
            if ($size == 1) {
                $s = "s1";
                $s2 = "up to 600";
            } else if ($size == 2) {
                $s = "s2";
                $s2 = "601-800";
            } else if ($size == 3) {
                $s = "s3";
                $s2 = "801-1000";
            } else if ($size == 4) {
                $s = "s4";
                $s2 = "1001-1200";
            } else if ($size == 5) {
                $s = "s5";
                $s2 = "1201-1400";
            } else if ($size == 6) {
                $s = "s6";
                $s2 = "1401-1600";
            } else {
                $s = 0;
                $s2 = 0;
            }


            if ($s != '0') {
                $sql = "SELECT price FROM priceCategory WHERE featureName = '$s'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $price = $row["price"];
                    }
                }
                $ps = $price;
            }
            $addonp;
            $addS;
            $index = 0;
            if (isset($_POST['add'])) {

                foreach ($addOn as $add) {
                    $sql = "SELECT price, featureName FROM priceCategory WHERE featureName = '$add'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $price = $row["price"];
                            $string = $row["featureName"];
                        }
                        $addonp += $price;
                        if($index != 0){
                            $addS .= ", ";
                        }
                        $addS .= $string;
                    }
                    $index = $index + 1;
                }
            }
            $total = $addonp + $ps + $pbath + $pbed;
        }
        
        $_SESSION['array_name'] = $addOn;
        ?>
    <center>
        <br><br>
        Estimate: <input type ="text" name="name" value="<?php echo $total; ?>">
        <br><br<br><br>
      
        <form method="post" action="enterhouseinfo.php">
            <input type="hidden" name="bed" value="<?php echo $bed; ?>">
            <input type="hidden" name="bath" value="<?php echo $bath; ?>">
            <input type="hidden" name="size" value="<?php echo $s2; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="hidden" name="add" value="<?php echo $addS; ?>">
            <input type="hidden" name="dataString" value="<?php echo $dataString; ?>">
            <button class="viewedbutton" type="submit">Book Cleaning</button>
        </form>
    </center> 

</body>
</html>