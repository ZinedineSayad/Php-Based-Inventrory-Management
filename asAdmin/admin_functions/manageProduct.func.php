<?php
//desplay all product
function display_product()
	{
		global $db;

		$req = $db->query("  SELECT b.name_emp, b.id_emp, c.id, a.N_lot,a.Name,a.Edate, a.Qtt, a.PPA, a.total_cost FROM product AS a, added_by AS c, employee AS b where a.N_lot=c.nlot AND c.id=b.id_emp ORDER by a.Name asc

			");
		$results = [];
		while($response = $req->fetch())
		{
			$results[] = $response;
		}
		return $results;
		$req->closeCursor();
	}
//desplay breks or expired
function display_state()
	{
			global $db;
			$q= $db->query("SELECT product.N_lot, product.Name, product.Edate, product.Qtt from product where (product.Edate<='20180624' or product.Qtt<='10') ORDER by product.Edate");
			
			$row1 = [];
			while($row = $q->fetch())
			{
				$row1[]=$row;
			}
			return $row1;
		$q->close();
	}	
// function to update the Product
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
		$req->closeCursor();
		$r=$db->prepare("UPDATE product SET total_cost=Qtt*PPA");
			$r->execute();
			$r->closeCursor();
			}
		else{?>
			<div class="dashboardErrorAddEmployee">
						<p><?php echo "Enter a valid Batch number";?></p>
					</div><?php
		}
	}


	?>



