<?php

include ('connect.php');
include ('header.php');

    $emSSN = 'SSN';
	$emPhonenumber = 'Phonenumber';
	$emFname ='Fname';
	$emLname = 'Lname';
	$emSalary = 'Salary';
	
	$query = "UPDATE Employee SET Fname = 'emFname', Lname = 'Lname',  Phonenumber = 'emPhonenumber',Salary = 'emSalary'
	         WHERE SSN = 'SSN'";
	$result = mysql_query ($query);
	
	if ($result)
		echo "<p> update successful </p>";
	else
		echo "<p> fail to update </p>";

?>
