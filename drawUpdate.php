<?php 
//session_start();
require_once('config\config.php');

//form data
$edituser = $_SESSION['editID'];
$edept = $_POST['edept'];
$eequip = $_POST['eequip'];
$esize =  $_POST['esize'];
$enumber = $_POST['enumber'];
$eext = $_POST['eext'];
$evendor = $_POST['evendor'];
$evendwg = $_POST['evendwg'];
$evenjob = $_POST['evenjob'];
$erevision = $_POST['erevision'];
$edate = $_POST['edate'];
$ewho = $_POST['ewho'];
$edesc = $_POST['edesc'];
$eeqid = $_POST['eeqid'];
$eeqsub = $_POST['eeqsub'];
$edraw = $_FILES['edraw']['name'];
//$echeckbox = $_POST['toggle'];

//file error handling
$target_dir = "swvaengpics/";
$target_file = $target_dir . basename($_FILES["edraw"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database man.<br/> Please try again later.</p>';
  exit; 
}


if ($_FILES['edraw']['size'] > 0) {
//delete current file from swvaengpics

// Check file size
if ($_FILES["edraw"]["size"] > 10485760) {
	echo "Your file is too large.";
	$uploadOk = 0;
} 	
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "tif") {
	echo "Only JPG, JPEG, PNG, PDF, & GIF files are allowed.";
	$checkFile = false;
	$uploadOk = 0;
}
$target_file = $target_dir . $edituser . "." . $imageFileType;
//$target_file = $target_dir . $edituser . "." . $imageFileType;
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Your file was not saved to the server.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["edraw"]["tmp_name"], $target_file)) {	
		echo "The file ". $target_file. " has been uploaded.";
	} else {
		echo "There was an error uploading your file.";
	}
}

//$edraw = $target_file;
$edraw = $imageFileType;


$query = "UPDATE sheet1 SET DEPARTMENT ='". $edept."', EQUIPMENT ='". $eequip."', SIZE ='". $esize."', NUMBER ='". $enumber."', 
 VENDOR ='". $evendor."', `VENDOR DWG NO` = '". $evendwg ."', `VENDOR JOB NO` = '". $evenjob ."',
 EXTENSION = '" . $eext."', REVISION ='". $erevision."', DATE ='". $edate."', WHO ='". $ewho."', DESCRIPTION ='". $edesc."',
 EQID ='". $eeqid."', EQSUB ='". $eeqsub."', DRAW ='". $edraw."' WHERE ID = '".$edituser."'";
 $stmt = $database->prepare($query);
 $stmt->execute();
 $res = $stmt->get_result();

}
//else - user does not want to change file
//if (is_null($echeckbox)) {
//      $query = "UPDATE sheet1 SET DEPARTMENT ='". $edept."', EQUIPMENT ='". $eequip."', SIZE ='". $esize."', NUMBER ='". $enumber."',
//	  	VENDOR ='". $evendor."', `VENDOR DWG NO` = '". $evendwg ."', `VENDOR JOB NO` = '". $evenjob ."',
//        EXTENSION = '" . $eext."', REVISION ='". $erevision."', DATE ='". $edate."', WHO ='". $ewho."', DESCRIPTION ='". $edesc."',
//        EQID ='". $eeqid."', EQSUB ='". $eeqsub."' WHERE ID = '".$edituser."'";
//        $stmt = $database->prepare($query);
//        $stmt->execute();
//        $res = $stmt->get_result();
//   //     echo "inside else";
//}

if ($_FILES['edraw']['size'] == 0) {
	$query = "UPDATE sheet1 SET DEPARTMENT ='". $edept."', EQUIPMENT ='". $eequip."', SIZE ='". $esize."', NUMBER ='". $enumber."',
		VENDOR ='". $evendor."', `VENDOR DWG NO` = '". $evendwg ."', `VENDOR JOB NO` = '". $evenjob ."',
	  EXTENSION = '" . $eext."', REVISION ='". $erevision."', DATE ='". $edate."', WHO ='". $ewho."', DESCRIPTION ='". $edesc."',
	  EQID ='". $eeqid."', EQSUB ='". $eeqsub."' WHERE ID = '".$edituser."'";
	  $stmt = $database->prepare($query);
	  $stmt->execute();
	  $res = $stmt->get_result();
 //     echo "inside else";
}

 echo "Success";
 //echo "Checkbox = " . $echeckbox;


//$stmt->free_result();
$database->close();

?>