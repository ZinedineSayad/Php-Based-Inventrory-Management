<?php

//create a functionn to insert data into the database
function insertRegisterData($name_emp, $password_emp)
{
	global $db;

	$sql = "INSERT INTO employee(name_emp, password_emp, date_emp) VALUES (:name_emp, :password_emp, NOW())";

	$query = $db->prepare($sql);
	$query->execute(array(
		"name_emp" => $name_emp,
		"password_emp" =>$password_emp
		));//
	$query->closeCursor();
}




?>