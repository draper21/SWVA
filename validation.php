<?php
	require_once('config\config.php');

    $username=$_POST['username']; 
	$password=$_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	//echo $hashed_password;

	//initialize session variable
	$_SESSION["admin"] = "";
	// if either form field is empty, issue an error, exit the script 
	// most likely will not happen since required='required' is inside form
	if (!$username || !$password) {
		echo '<p>You have not entered a username and/or password.<br/> Please try again.</p>';
		exit; 
	} 
	//create a new object of type mysqli called $database to interact with our database connection 
	@$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
	  echo '<p>Error: Could not connect to database!<br/> Please try again later.</p>';
	  exit;
	} 
	
		//Find the username and password fields from the table login where username and password = the user input
    $query = "SELECT emp_Username, emp_Password, isAdmin  FROM employee WHERE emp_Username = ?";
        $stmt = $database->prepare($query);
        $stmt->bind_param('s', $username);   
	    $stmt->execute();
        $stmt->store_result();
	    $stmt->bind_result($usernamedb, $passworddb, $isAdmindb);
	    $stmt->fetch();
        
		if (($usernamedb == $username) && (password_verify($password, $passworddb)) && ($isAdmindb == 1))
		{
			$_SESSION["empID"] = $usernamedb;
			$_SESSION["admin"] = $isAdmindb;
			echo "Admin";
			//echo "isAdmin = " . $isAdmindb;
		}
		else if (($usernamedb == $username) && (password_verify($password, $passworddb)) && ($isAdmindb == 0))
		{
			$_SESSION["empID"] = $usernamedb;
			$_SESSION["admin"] = $isAdmindb;
			echo "Employee";
		}
		else 
		{
			echo "FAILURE";
			$_SESSION["empID"] = "Failed";
		}
		
	$stmt->free_result(); 
	$database->close(); 
	?>