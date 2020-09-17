<?php
	
try
{
	$db = new PDO('mysql:host=localhost; dbname=Drug_store', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(Exception $e)
{
	die('An error has been occurred while connecting to tha database'.$e->getMessage());
}

?>