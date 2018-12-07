<?php

include ('connect.php');
include ('header.php');

    $service = $_POST['service'];
	  $price = $_POST['price'];
	
	
	function addService($service,$price){
		try{
			mysqli_query($conn,"INSERT INTO Service(service,price)
			VALUES('{$service}','{$price}')");
		}catch (Exception $e){
			echo $e ->getMessage();
		}
		echo "success";
	}
	addService($service,$price);
	?>
	
	
