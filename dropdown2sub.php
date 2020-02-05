<?php
	// session_start();
	 require_once('config\config.php');

		$deptID =  $_SESSION['deptID'];
		$equipID = $_GET['dropdown2'];
		$_SESSION['dropdown2'] = $_GET['dropdown2'];

		//$eqdescID = $_GET['dropdown3'];
		//$_SESSION['dropdown3'] = $_GET['dropdown3'];

	// create a new object of type mysqli called $db to interact with our database connection 
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
  		echo '<p>Error: Could not connect to database.<br/> Please try again later.</p>';
  		exit; 
	} 
	
	$query = "SELECT DISTINCT EQSUB FROM sheet1 WHERE DEPARTMENT = ? AND EQUIPMENT = ? AND EQSUB != '' ORDER BY EQSUB"; 
    $stmt = $database->prepare($query); 
    $stmt->bind_param('ss', $deptID, $equipID);
	$stmt->execute(); 
	$res = $stmt->get_result();


	echo '<option value = "" selected></option>';
	while($row = $res->fetch_assoc()) {
        echo "<option>" . $row['EQSUB'] . "</option>";    
  	}
	
	$stmt->free_result(); 
	$database->close(); 

	?>