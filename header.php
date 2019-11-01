<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SWVA Engineering Database</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

	
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
 	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<!--datatables -->
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 


</head>
	<header>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top justify-content-between nav item">
  <!-- Brand/logo -->
    <img class="float-left" src="img/logo.png" alt="logo" style="width:40px;" >
  <!-- Links -->
  <ul class="navbar-nav">
    
<?php 
session_start();


if (isset($_SESSION["admin"])) {
	$_SESSION["admin"];
}
else {
	$_SESSION["admin"] = 0;
}

//print_r($_SESSION);

if($_SESSION["admin"] == 1) {
   echo '<li class="nav-item"><a class="nav-link" href="addtoDB.php">Add Drawing</a></li>';
   echo '<li class="nav-item"><a class="nav-link" href="drawEDIT.php">Edit Drawing</a></li>';
   echo '<li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>';
   echo	'<li class="nav-item"><a class="nav-link" href="manualsearch.php">Custom Search</a></li>';
   echo	'<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
}

if($_SESSION["admin"] == 0) {
	echo '<li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>';
	echo '<li class="nav-item"><a class="nav-link" href="manualsearch.php">Custom Search</a></li>';
	echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
}


?>
  </ul>
  <img src="img/logo.png" alt="logo" style="width:40px;" class="float-right">
</nav>

	</header>
	<body>