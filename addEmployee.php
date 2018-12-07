<?php

include ('connect.php');
include ('header.php');


	$emSSN = $_POST['SSN'];
	$emPhonenumber = $_POST['Phonenumber'];
	$emFname = $_POST['Fname'];
	$emLname = $_POST['Lname'];
	$emSalary = $_POST['Salary'];
	
	function addEmployee($emSSN,$emPhonenumber,$emFname,$emLname,$emSalary){
		try{
			mysqli_query($conn,"INSERT INTO Employees(SSN,Phonenumber,Fname,Lname,Salary)
			VALUES('{$emSSN}','{$emPhonenumber}','{$emFname}','{$emLname}','{$emSalary}')");
		}catch (Exception $e){
			echo $e ->getMessage();
		}
		echo "success";
	}
	addEmployee($emSSN,$emPhonenumber,$emFname,$emLname,$emSalary);
	?>
	
	

