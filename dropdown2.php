<?php
	 //session_start();
	 require_once('config\config.php');

		 $deptID =  $_GET['dropdown1'];
		 $_SESSION['deptID'] =  $_GET['dropdown1'];
	 
	// create a new object of type mysqli called $db to interact with our database connection 
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
  		echo '<p>Error: Could not connect to database on adminresults.php page.<br/> Please try again later.</p>';
  		exit; 
	} 
	
	$query = "SELECT DISTINCT DISTINCT EQUIPMENT 
			  FROM sheet1
			  INNER JOIN department
			  ON sheet1.department = department.department 
			  WHERE department.department = ? AND EQUIPMENT != ''
			  ORDER BY EQUIPMENT"; 
    $stmt = $database->prepare($query); 
    $stmt->bind_param('s', $deptID);
	$stmt->execute(); 
	$res = $stmt->get_result();

	echo '<option value = "" disabled selected></option>';
	while($row = $res->fetch_assoc()) {
    
        echo "<option>" . $row['EQUIPMENT'] . "</option>";
           
  	}
	
	$stmt->free_result(); 
	$database->close(); 

	?>