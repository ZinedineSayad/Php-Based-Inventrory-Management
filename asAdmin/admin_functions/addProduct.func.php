<?php

//create a functionn to insert data into the database
function insertRegisterData($id, $Nlot, $P_name, $Edate, $P_ppa, $p_qtt, $P_dosage, $P_condi)
{
	global $db;

	$sql = "INSERT INTO product (N_lot, Name, Edate, PPA, Qtt, Dosage, condi) VALUES (:Nlot, :P_name, :Edate, :P_ppa, :p_qtt, :P_dosage, :P_condi)";
	
	$query = $db->prepare($sql);
	$query->execute(array("Nlot" => $Nlot,"P_name" => $P_name,"Edate" => $Edate,"P_ppa" => $P_ppa,
		"p_qtt" => $p_qtt,"P_dosage" => $P_dosage, "P_condi" => $P_condi ));
	$query->closeCursor();
	$q="INSERT INTO added_by (id, nlot) VALUES (:id, :nlot)";
	$sqlq=$db->prepare($q);
	$sqlq->execute(array("id" =>$id ,"nlot"=>$Nlot ));
	$sqlq->closeCursor();
}
?>