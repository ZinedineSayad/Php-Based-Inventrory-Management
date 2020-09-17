<?php
include_once "../home_functions/connect_db.php";
$pages = scandir('Employee_pages/');
if(isset($_GET['page']) AND !empty($_GET['page'])){
	if(in_array($_GET['page'].'.php', $pages)){
		$page = $_GET['page'];
	}else{
		$page = "employeeError";
	}
}else{
	$page = "dashboard";
}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/pharm.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/mterialize.css">
	<link rel="stylesheet" href="../css/w3.css">
	
</head>
<body>

<!-- include the the navigation bar -->
	
	<?php
		include_once "Employee_body/employeeNavigation.php";
	?>
	
<!-- apply a container for all the page -->
	<div class="container">
	<?php 	
		include_once 'Employee_pages/'.$page.'.php';
	?>
	</div>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script src="../js/myscript.js"></script>



</body>
</html>