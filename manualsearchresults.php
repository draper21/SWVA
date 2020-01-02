<?php
	 //session_start(); 
	 require_once('config\config.php');
	 //$_SESSION['wildcard'] = $_GET['wildcard'];
	 //$wildcard = $_GET['wildcard'];
	 $target_dir = "swvaengpics";
	// $deptID =  $_GET['dropdown1'];
	//echo "DeptID= " . $deptID;

		@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
  		echo '<p>Error: Could not connect to database on manualsearchresults.php page.<br/> Please try again later.</p>';
  		exit; 
	} 
	
//	if ($deptID == "alldept"){
	$query = "SELECT ID, DEPARTMENT, EQUIPMENT, SIZE, NUMBER, EXTENSION, VENDOR, `VENDOR DWG NO`, `VENDOR JOB NO`, REVISION, DATE, WHO, DESCRIPTION, EQID, EQSUB, DRAW
			  FROM sheet1";
	$stmt = $database->prepare($query);
	//$stmt->bind_param('s', $deptID);
	$stmt->execute();
	$res = $stmt->get_result();
//	}


//	if ($deptID != "alldept") {
//	$query = "SELECT ID, DEPARTMENT, EQUIPMENT, SIZE, NUMBER, EXTENSION, VENDOR, `VENDOR DWG NO`, `VENDOR JOB NO`, REVISION, DATE, WHO, DESCRIPTION, EQID, EQSUB, DRAW
//			  FROM sheet1 WHERE DEPARTMENT = ?";
//	$stmt = $database->prepare($query);
//	$stmt->bind_param('s', $deptID);
//	$stmt->execute();
//	$res = $stmt->get_result();
//	}
	




	while($row = $res->fetch_assoc()) {
	
		echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['DEPARTMENT'] . "</td><td>";
		echo $row['EQUIPMENT'] . "</td><td>" . $row['EQID'] . "</td><td>" . $row['EQSUB'] . "</td><td>";
		echo $row['SIZE'] . "</td><td>" . $row['NUMBER'] . "</td><td>" . $row['EXTENSION'] . "</td><td>"; 
		echo $row['VENDOR'] . "</td><td>" . $row['VENDOR DWG NO'] . "</td><td>" . $row['VENDOR JOB NO'] . "</td><td>";
		echo $row['REVISION'] . "</td><td>" . $row['DATE'] . "</td><td>" . $row['WHO'] . "</td><td>";
		echo $row['DESCRIPTION'] . "</td><td>";
		
		echo "<a target='_blank' href='" . (strripos($row['DRAW'], ".") !== false ? $row['DRAW'] : $target_dir . "/" . $row['ID'] . "." . $row['DRAW']) . "'>";
		//if the drawing is an image, display
		if ((strripos(($row['DRAW']), "jpg") !== false) || (strripos(($row['DRAW']), "jpeg") !== false) || (strripos(($row['DRAW']), "png") !== false) || (strripos(($row['DRAW']), "gif") !== false))  {
			echo '<img width="50" height="50" border="0" src="'.
			(strripos($row['DRAW'], ".") !== false ? $row['DRAW'] : $target_dir . "/" . $row['ID'] . "." . $row['DRAW']) .'" class ="img-responsive"  title = "Click to enlarge in new tab" 
			alt = "Either No Image or PDF"/></a>' . "</td></tr>";
		}
		//if the drawing is a pdf, 
		if (strripos(($row['DRAW']), "pdf") !== false) {
			echo "Open PDF";
		}	
		//if the drawing is a tif, 
		if (strripos(($row['DRAW']), "tif") !== false) {
			echo "Download TIF";
		}	
	}
    
	$stmt->free_result(); 
	$database->close(); 

	?>