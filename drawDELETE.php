<?php
require_once('config\config.php');
session_start();
$edituser = $_SESSION['editID'];
$drawing = NULL;

@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database man.<br/> Please try again later.</p>';
  exit; 
}

$query2 = "SELECT DRAW FROM sheet1 WHERE ID = '".$edituser."'";
$stmt2 = $database->prepare($query2);
$stmt2->execute();
//$stmt2->bind_result('s', $drawing);
$res = $stmt2->get_result();

    //delete the file from the server
    while($row = $res->fetch_assoc()) {
    unlink($row['DRAW']);
    } 

$query = "DELETE FROM sheet1 WHERE ID = '".$edituser."'";
$stmt = $database->prepare($query);
$stmt->execute();
$res = $stmt->get_result();

//$target_dir = "C:/xampp/htdocs/SWVA/swvaengpics/";

//delete specific file

//unlink($drawing);
echo "Success";

$stmt2->free_result();
$stmt->free_result();
$database->close();

?>