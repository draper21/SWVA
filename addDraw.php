
<?php require_once("header.php"); ?>
<?php require_once('config\config.php'); ?>
<section class="about section-margin mb-7 text-center" id="putcontent" style = "padding-top: 80px; min-height: 70vh;">

<?php
//session_start();
$_SESSION['dropdownadd'] = $_POST['dropdown'];
$newFileName = $_POST['number'];
$target_dir = "swvaengpics/";
$target_file = $target_dir . basename($_FILES["drawing"]["name"]);
//$target_file = $target_dir . mysqli_insert_id($database);
//print_r($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
	echo "<h3>File already exists. <br /></h3>";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["drawing"]["size"] > 10485760) {
	echo "<h3>Your file is too large. <br /></h3>";
	$uploadOk = 0;
} 	
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "tif") {
	echo "<h3>Only JPG, JPEG, PNG, PDF, TIF, & GIF files are allowed. <br /></h3>";
	$checkFile = false;
	$uploadOk = 0;
}

//variables for form submission
$department = $_POST['dropdown'];
$equipment = $_POST['equipment'];
$equipID = $_POST['equipid'];
$equipSub = $_POST['equipsub'];
$size = $_POST['size'];
$number = $_POST['number'];
$extension = $_POST['extension'];
$vendor = $_POST['vendor'];
$vendwg = $_POST['vendwg'];
$venjob = $_POST['venjob'];
$description = $_POST['description'];
$revision = $_POST['revision'];
$date = $_POST['date'];
$by = $_POST['by'];
$drawing = $_FILES["drawing"]["name"];
$drawing = "swvaengpics/" . $_FILES['drawing']['name'];

	//only runs database query if valid file type for security
	if ($uploadOk == 1) {
	// create a new object of type mysqli called $database to interact with our database connection 
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
	  echo '<p>Error: Could not connect to database!<br/> Please try again later.</p>';
	  exit;
	} 
	
	$query = "INSERT INTO sheet1 (DEPARTMENT, EQUIPMENT, EQID, EQSUB, SIZE, NUMBER, EXTENSION, VENDOR, `VENDOR DWG NO`, 
	`VENDOR JOB NO`, REVISION, DATE, WHO, DESCRIPTION, DRAW) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $database->prepare($query);
	$stmt->bind_param('sssssssssssssss', $department, $equipment, $equipID, $equipSub, $size,
	$number, $extension, $vendor, $vendwg, $venjob, $revision, $date, $by, $description, $imageFileType);
	
	if($stmt->execute()) {
		$success1 = true;
	}
	
	//printf ("New Record has id %d.\n", mysqli_insert_id($database));
	$target_file = $target_dir . mysqli_insert_id($database) . "." . $imageFileType;
	//print_r($target_file);
	$getid = mysqli_insert_id($database);

	$stmt->free_result(); 
//	$stmt2->free_result();
	$database->close(); 
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "<h3>Your file was not saved to the server. <br /></h3>";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["drawing"]["tmp_name"], $target_file)) {	
		echo "<h3>The file ". $target_file . " has been uploaded.</h3>";
	} else {
		echo "<h3>There was an error uploading your file. <br /></h3>";
	}
}
//if invalid file type, do not run query
	if ($uploadOk == 0) {
		echo "<h3>Did not update database, invalid file type or duplicate file name<br /></h3>";
		echo '<div class="alert alert-danger w-25 mx-auto" role="alert">
		<a href="addtoDB.php" class="alert-link" >Error: Click here to try again</a>
	    </div>';
	}

	if ($success1 == true) {
		echo '<div class="alert alert-success w-25 mx-auto" role="alert">
		<a href="addtoDB.php" class="alert-link" >Database Updated! Click here to submit another drawing</a>
		</div>';
	}
	else {
		echo "<h3>Upload Failure " . "</h4><br />";
	}
//
	//if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" || $imageFileType == "tif") {
	//	echo "<h4>You just uploaded this image:" . "</h4>";
	//	echo '<img src="' . $drawing . '" alt="Random image" style="max-width:20%; max-height:20%;"/>' . "<br /><br />";
	//}
	//if($imageFileType == "pdf") {
	//	echo "<h4>You just uploaded this PDF:" . "</h4>";
	//	echo '<embed src="' . $drawing . '" width="20%" height="20%" type="application/pdf"/>' . "<br /><br />";
	//}

?>
</section>

<?php require_once("footer.php");?>