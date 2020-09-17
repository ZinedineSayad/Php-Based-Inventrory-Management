<?php

//create a functionn to insert data into the database
function insertData($id, $name, $ptt, $lot, $type, $pnew)
{
	global $db;
				
	$answer=[];		
	$sum=$db->prepare(" SELECT PPA from product where N_lot =:lot");
	$sum->execute(array("lot" => $lot));
	$now=$sum->fetch();
	$answer=$now;
	$total=$answer[0];
	$cost=$total * $ptt;
	$query = $db->prepare("INSERT INTO sales (name, Qtt, Total, type) VALUES (:name, :Ptt, :total, :type)");
	$query->execute(array("name" => $name, "Ptt" => $ptt, "total"=>$cost, "type"=> $type));
	$query->closeCursor();

	$q1=$db->prepare("INSERT INTO sold (id_s, id_lot) VALUES (LAST_INSERT_ID(), :lot)");
	$q1->execute(array('lot'=>$lot));
	$q1->closeCursor();

	$i=$db->prepare(" SELECT id_s from sales where id_s =LAST_INSERT_ID()");
	$i->execute();
	$w=$i->fetch();
	$s=$w;
	$t=$s[0];
	$q2=$db->prepare("INSERT INTO sold_by (id_s, id_emp) VALUES (:d, :s)");
	$q2->execute(array('d'=>$t,'s'=>$id));
	$q2->closeCursor();	

	$q3=$db->prepare("UPDATE product set Qtt=:new where N_lot= :nlo");
	$q3->execute(array('new'=>$pnew, 'nlo'=>$lot));
	$q3->closeCursor();
}
?>