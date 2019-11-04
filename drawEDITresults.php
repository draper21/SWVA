<?php
	session_start(); 
	require_once('config\config.php');
	$deptID = $_SESSION['deptID'];
	$equipID =  $_SESSION['dropdown2'];
	$eqdescID = $_SESSION['dropdown3'];
	$target_dir = "swvaengpics";
	
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
  		echo '<p>Error: Could not connect to database on searchresults.php page.<br/> Please try again later.</p>';
  		exit; 
	} 
	
	$query = "SELECT ID, DEPARTMENT, EQUIPMENT, SIZE, NUMBER, EXTENSION, VENDOR, `VENDOR DWG NO`, `VENDOR JOB NO`, REVISION, DATE, WHO, DESCRIPTION, EQID, EQSUB, DRAW
	 FROM sheet1 WHERE DEPARTMENT = ? AND EQUIPMENT = ?"; 
    $stmt = $database->prepare($query); 
    $stmt->bind_param('ss', $deptID, $equipID);
	$stmt->execute(); 
	$res = $stmt->get_result();

	while($row = $res->fetch_assoc()) {
        
        echo "<tr><td>" . "<a href=" . "drawChange.php" . "?id=" . $row['ID'] . ">" . $row['ID'] . "</a></td><td>";
        echo $row['DEPARTMENT'] . "</td><td>";
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
		if (strripos(($row['DRAW']), "pdf") != false) {
			echo "Open PDF";
		}		
		
  	}
	
	$stmt->free_result(); 
	$database->close(); 

	?>