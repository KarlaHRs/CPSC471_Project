<?php
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con,"cleaning_system");

$sql = "SELECT * FROM username";

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
      <li> <a href="customer.php" >Customer</a>

	  </li>
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
  <h1 class="headingBrown">CUSTOMER INFORMATION</h1><br>
 <table width = "900" border = "2" cellpadding = "1" cellspacing = "1" id = "clients">
 <tr>
   <th>Customer Username</th>
 <th>Customer FName</th>
  <th>Customer LName</th>
   <th>Customer Email</th>
  <th>Customer Password</th>


  </tr>

  <?php
  while($customer = mysqli_fetch_assoc($result)){
  echo  "<tr>";
  echo "<td>".$customer['userName']."</td>";
  echo "<td>".$customer['password']."</td>";
  echo "<td>".$customer['FName']."</td>";
  echo "<td>".$customer['LName']."</td>";
  echo "<td>".$customer['email']."</td>";
  echo  "</tr>";

  }
  ?>


</div>
<div id="footer">
  <p> Copyright&copy; 2018. <br>

  <a href="ziyin.zhao@ucalgary.ca" class="a">Contact Webmaster</a> </p></div>
  </div>

</body>

</html>
