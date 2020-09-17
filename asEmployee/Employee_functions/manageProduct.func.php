<?php

function display_product()
	{
		global $db;

		$req = $db->query("  SELECT 	id,N_lot,Name,Edate, Qtt, PPA
							 FROM product, added_by where product.N_lot=added_by.nlot ORDER by product.Name asc

			");
		$results = [];
		while($response = $req->fetch())
		{
			$results[] = $response;
		}
		return $results;
		$req->closeCursor();
	}

// function to update the employees
	function ubdate_product($Nlot, $Edate, $p_qtt)
	{
		global $db;
		$t= $db-> prepare("SELECT N_lot FROM product where N_lot= :lot");
		$t->execute(array('lot' =>$Nlot));
		$answer= $t->fetch();
		if($answer){
		$y=0;
		$quantityNew ="SELECT Qtt from product where N_lot = :nlo";
		$new= $db->prepare($quantityNew);
		$new->execute(array('nlo' => $Nlot ));

		$row=$new->fetch(PDO::FETCH_ASSOC);
			if($row){
				$y=$row['Qtt'];
				$y+=$p_qtt;
			}
			$new->closeCursor();
			$query = "UPDATE product SET Edate = :Edate, Qtt = :Qtt WHERE N_lot = :Nlot";
			$req = $db->prepare($query);
			$req->execute(array(
				'Edate' => $Edate,
				'Qtt' =>$y,
				'Nlot' => $Nlot
				));		
		$req->closeCursor();}
		else{?>
			<div class="dashboardErrorAddEmployee">
						<p><?php echo "Enter a valid Batch number";?></p>
					</div><?php
		}
	}

	?>
