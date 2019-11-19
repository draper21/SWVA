<?php

session_start();

//Global Variables:
//$target_dir = "swvaengpics";


//Constants for database
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'swvaadmin');
define( 'DB_PASS', 'wearemarshall2006');
define( 'DB_NAME', 'engineering_new');
define( 'SEND_ERRORS_TO', 'jdraper@swvainc.com');
define( 'DISPLAY_DEBUG', true);

@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
	  echo '<p>Error: Could not connect to database!<br/> Please try again later.</p>';
	  exit;
	}
 
?>