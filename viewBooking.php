<?php
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con,"nanny_shack");

$sql = "SELECT * FROM booking";

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
      <li> <a href="customer.php" >Customer</a> </li>
      <li> <a href="employee.php" >Employee</a>

      </li>

     <li> <a href="viewbookings.php" >Bookings</a> </li>


      </ul></li>
      <li> <a href="logout.php" >Log Out</a>
      </li>
    </ul>


  </div>
</div>


<div id="content">
  <h1 class="headingBrown">Booking information</h1><br>
 <table width = "900" border = "2" cellpadding = "1" cellspacing = "1" id = "clients">
 <tr>
 <th>Cleaning ID</th>
  <th>Day</th>
    <th>Month</th>
    <th>Year</th>
    <th>Time</th>
    <th>Customer</th>
    <th>Phonenumber</th>
    <th>Location</th>

  </tr>

  <?php
  while($booking = mysqli_fetch_assoc($result)){
  echo  "<tr>";
  echo "<td>".$booking['CleaningID']."</td>";
  echo "<td>".$booking['Day']."</td>";
  echo "<td>".$booking['Month']."</td>";
  echo "<td>".$booking['Year']."</td>";
  echo "<td>".$booking['Time']."</td>";
  echo "<td>".$booking['Customer']."</td>";
  echo "<td>".$booking['Phonenumber']."</td>";
  echo "<td>".$booking['Location']."</td>";

  echo  "</tr>";

  }
  ?>

  </table>

<p><a href="datePick.php" ><button name="insert" id="button">Booking </button> </a>
</p>


</div>
<div id="footer">
  <p> Copyright&copy; 2018. <br>

  <a href="ziyin.zhao@ucalgary.ca" class="a">Contact Webmaster</a> </p></div>
  </div>

</body>

</html>