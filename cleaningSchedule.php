<?php
session_start();
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$con = mysqli_connect("localhost", "breesuisui");
mysqli_select_db($con,"cleaning_system");

$sql ="select * from current_schedule where day = '$day',month = 'month', year = 'year'";

$result = mysqli_query($con,$sql);

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
  <h1 class="headingBrown">CHECK AVAILABILITY</h1><br>
 <table width = "900" border = "2" cellpadding = "1" cellspacing = "1" >
 <tr>
 <th>Day</th>
  <th>Month</th>
   <th>Year</th>
     <th>Time</th>
       <th>Availability</th>

  </tr>

  <?php
  while($cal = mysqli_fetch_assoc($result)){
   $d = $cal['Day'];
   $m = $cal['Month'];
   $y = $cal['Year'];
   $t = $cal['Time'];
   $a = $cal['Availability'];
 



  echo  "<tr>";
  echo "<td>".$d."</td>";
  echo "<td>".$m."</td>";
  echo "<td>".$y."</td>";
  echo "<td>".$t."</td>";
  echo "<td>".$a."</td>";
  echo  "</tr>";

  }
  ?>

  </table>

<p><a href="bookings.php" ><button name="insert" id="button">BOOK</button> </a>



</div>
<div id="footer">
  <p> Copyright&copy; 2018. <br>

  <a href="ziyin.zhao@ucalgary.ca" class="a">Contact Webmaster</a> </p></div>
  </div>

</body>

</html>
