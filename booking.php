<?php/
session_start();

$con = mysqli_connect("localhost", "breesuisui");
mysqli_select_db($con,"CleaningCompany");

$fields = array('day', 'month', 'year', 'time', 'serviceType', 'CUserName','contact');

$error = false;
foreach($fields AS $field) {
  if(!isset($_POST[$field]) || empty($_POST[$field])) {

    $error = true;
  }
}

if(!$error) {
	$day = mysqli_real_escape_string($con,$_POST['day']);
	$month = mysqli_real_escape_string($con,$_POST['month']);
	$year= mysqli_real_escape_string($con,$_POST['year']);

	$time = mysqli_real_escape_string($con,$_POST['time']);
	$serviceType = mysqli_real_escape_string($con,$_POST['serviceType']);
	$CUserName = mysqli_real_escape_string($con,$_POST['CUserName']);
	$contact = mysqli_real_escape_string($con,$_POST['contact']);
	

	
	$sql = "INSERT INTO booking(day,month,year,time,serviceType,CUserName,contact) VALUES ('day','month','year','time','serviceType','CUserName','contact')";
	

		$result = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($result);
		

		header("location: index.php");
		
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CleaningCompany</title>
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
<form  method="POST">
        <table border="0.5" >

            <tr>

                <td><label for="day">DAY</label></td><br>
                <td><input type="day" name="day"></td><br>
            </tr>
           <tr>
                <td><label for="month">MONTH</label></td><br>
                <td><input type="month" name="month"></td><br>
            
			<tr>
			<tr>
                <td><label for="year">YEAR</label></td><br>
                <td><input type="year" name="year"></td><br>
            
			<tr>
		    <tr>
                <td><label for="month">MONTH</label></td><br>
                <td><input type="month" name="month"></td><br>
            
			<tr>
			
			<tr>
                <td><label for="time">TIME</label></td><br>
                <td><input type="time" name="time"></td><br>
            
			<tr>
			
			<tr>
                <td><label for="serviceType">SERVICETYPE</label></td><br>
                <td><input type="serviceType" name="serviceType"></td><br>
            
			<tr>
			
			<tr>
                <td><label for="CUserName">USERNAME</label></td><br>
                <td><input type="CUserName" name="CUserName"></td><br>
            
			<tr>
			<tr>
                <td><label for="contact">CONTACT</label></td><br>
                <td><input type="contact" name="contact"></td><br>
            
			<tr>
            <tr>

                <td><input type="submit" name = "regBtn" value="BOOK" id = "button" /><br>



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
