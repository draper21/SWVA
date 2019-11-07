<?php
	 //session_start();
	 require_once('config\config.php');
    
	// create a new object of type mysqli called $db to interact with our database connection 
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
  		echo '<p>Error: Could not connect to database on adminresults.php page.<br/> Please try again later.</p>';
  		exit; 
	} 

	$query = "SELECT DEPARTMENT FROM department ORDER BY DEPARTMENT"; 
    $stmt = $database->prepare($query); 
	$stmt->execute(); 
	$res = $stmt->get_result();

	while($row = $res->fetch_assoc()) {
        echo "<option value = '$row[DEPARTMENT]'>" . $row['DEPARTMENT'] . "</option>";
  	}
	
	$stmt->free_result(); 
	$database->close(); 

	?> 