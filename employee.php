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
  <h1 class="headingBrown">EMPLOYEE INFORMATION</h1><br>
 <table width = "900" border = "2" cellpadding = "1" cellspacing = "1" id = "clients">
 <tr>
   <th>Employee Username</th>
 <th>Employee FName</th>
  <th>Employee LName</th>
   <th>Employee Email</th>
  <th>Employee Password</th>


  </tr>

  <?php
  while($employee = mysqli_fetch_assoc($result)){
  echo  "<tr>";
  echo "<td>".$employee['userName']."</td>";
  echo "<td>".$employee['password']."</td>";
  echo "<td>".$employee['FName']."</td>";
  echo "<td>".$employee['LName']."</td>";
  echo "<td>".$employee['email']."</td>";
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
