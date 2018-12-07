<?php

session_start();
    $day = "";
$_SESSION[''] = $day;
$month = " ";
$_SESSION[' '] = $month;
$year = "   ";
$_SESSION['   '] = $year;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cleaning Company</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styleGuide.css" rel="stylesheet" type="text/css">
</head>


<body>
<div id="container">
<div id="banner"></div>
<div class="navBar-wrap">
  <div class ="navBar">
    <ul>
      <li> <a href="index.php" >Home</a> </li>
      <li> <a href="information.php" >About Us</a>

      </li>
		 <li> <a href="datePick.php" >Bookings</a> </li>

      <li> <a href="contacts.php" >Contact Us</a> </li>
		<li> <a href="#" >Login</a>
		<ul>
			<li> <a href="login.php" >Member Login</a> </li>
			<li> <a href="admin_login.php" >Admin Login</a> </li>
			</ul></li>
    </ul>


  </div>
</div>


<div id="content">
  <h1 class="headingBrown">BOOK US</h1>
 <div id = "frm2">
<form  method="POST" action = "cleaningSchedule.php">
        <table border="0.5" >

            <tr>

                <td><label for="day">Day</label></td><br>
                <td><input type="day" name="pDay"></td><br>
            </tr>
			
			<tr>

                <td><label for="month">Month</label></td><br>
                <td><input type="month" name="pMonth"></td><br>
            </tr>

             <tr>

                <td><label for="year">Year</label></td><br>
                <td><input type="year" name="pYear"></td><br>
            </tr>

            <tr>

                <td>
				<input type="submit" value="CHECK" id = "button" />
				 </td><br>



            </tr>
        </table>
    </form>
</div>
</div>
<div id="footer">
  <p> Copyright&copy; 2018. <br>

  <a href="ziyin.zhao@ucalgary.ca" class="a">Contact Webmaster</a> </p></div>
  </div>

</body>

</html>
