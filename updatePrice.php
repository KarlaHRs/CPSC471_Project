
<?php

include ('connect.php');
include ('header.php');
    $service = 'service';
	$price = 'price';
	
	
	$query = "UPDATE SERVICE SET price = 'price'
	         WHERE service = 'service'";
	$result = mysql_query ($query);
	
	if ($result)
		echo "<p> update successful </p>";
	else
		echo "<p> fail to update </p>";
?>
