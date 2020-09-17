<?php
session_start();

include_once "../home_functions/connect_db.php";
/*if(1){
    echo "User not logged in. Redirect them back to the index.php page.";
    header('Location: ../index.php');
    exit;
}*/
$pages = scandir('admin_pages/');
if(isset($_GET['page']) AND !empty($_GET['page'])){
	if(in_array($_GET['page'].'.php', $pages)){
		$page = $_GET['page'];
	}else{
		$page = "adminError";
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
		include_once "admin_body/adminNavigation.php";
	?>
	
<!-- apply a container for all the page -->
	<div class="container">
	<?php 	
		include_once 'admin_pages/'.$page.'.php';
	?>
	</div>

<script
  src="../js/j.js"></script>
<script src="../js/myscript.js"></script>



</body>
</html>