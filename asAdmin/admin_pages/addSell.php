<?php
	include_once "admin_functions/manageSells.func.php";
	if(isset($_POST['addsell']))
	{
		
	global $db;

		$req = $db->query("  SELECT 	id_manager
							 FROM 	manager 
							");

		$results=[];
		$response = $req->fetch();
		$results = $response;
		$id=$results[0];
		$req->closeCursor();

		$p_qtt=htmlspecialchars(trim($_POST['Qtt']));
		$lot=htmlspecialchars(trim($_POST['lot']));
		$name = htmlspecialchars(trim($_POST['name']));
		$type= $_POST['type'];
		
		if(!empty($lot) && !empty($p_qtt) && $name!= "select" && !empty($type))
		{
			
			global $db;
			$answer=[];
			$q= $db->prepare("SELECT Qtt, N_lot FROM product where N_lot=:lot");
			$q->execute(array('lot'=>$lot));
			$answer1= $q->fetch();
			$answer=$answer1;
			$exsited=$answer[0];

			if ($answer[1]) {
					
					if($p_qtt <= $exsited){
						$pNew=$exsited - $p_qtt;
						insertData($id, $name, $p_qtt, $lot, $type, $pNew);
						?>
							<div class="dashboardsuccessAddProduct">
									<p><?php echo "Sell Added Succesfully";?></p>
								</div>
						<?php }else{ ?>
							<div class="dashboardsuccessAddProduct">
									<p><?php echo "Quantity out of stock";?></p>
								</div>
						<?php 
								}
					}else{?>
							<div class="dashboardsuccessAddProduct">
									<p><?php echo "lnvalid butch number";?></p>
								</div>
				<?php 	}

		}else{
			
				?>

					<div class="dashboardErrorAddProduct">
						<p><?php echo "please fill all the fields";?></p>
					</div>
				<?php
			
		}
	}

?>

<div class="dashboardMenu">
  <a href="index.php?page=addEmployee" class="waves-effect waves-light btn"><i class="material-icons right">person_add</i>Add an Employee</a>
  <a href="index.php?page=manageEmployee" class="waves-effect waves-light btn"><i class="material-icons right">group</i>Manage Employees</a>
  <a href="index.php?page=addProduct" class="waves-effect waves-light btn"><i class="material-icons right">add_box</i>Add a Product</a>
  <a href="index.php?page=manageProduct" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>Manage Products</a>
  <a href="index.php?page=addSell" class="waves-effect waves-light btn"><i class="material-icons right">add_circle</i>Add a sale</a>
  <a href="index.php?page=manageSells" class="waves-effect waves-light btn"><i class="material-icons right">toc</i>Manage Sales</a>
  <!--view_list -->
  <a href="index.php?page=sellsState" class="waves-effect waves-light btn"><i class="material-icons right">list</i>sales State</a>
  <a href="index.php?page=productState" class="waves-effect waves-light btn"><i class="material-icons right">list</i>Product State</a>
</div>

<div class="dashboardCore" style="font-size: 1.2em;">
		<h1 class="flow-text"><i class="material-icons prefix">mode_edit</i>Add new sell</h1>
<div class="row">
	<form class="col s12" action="index.php?page=addSell" method="POST">
      <div class="rows">
		<label class="black-text text-darken" style="font-size: 1em;">Sold via chifa card ?</label>      	
			<input type="radio" name="type" value="Yes" id="yes"/> <label for="yes">Yes</label>
			<input type="radio" name="type" value="No" id="no"/> <label for="no">No</label>
	  </div>
      <div class="rows">
	<div class="w3-section col s12 m12 blue-text text-darken">Select Product
        <?php
         $stmt = $db->prepare("SELECT Name, N_lot FROM product order by Name asc");
	      $stmt->execute();

	      echo "<select name='name' class='w3-light-grey w3-dropdown-click'>";
	      ?>
	      
	      <option value="select">--select--</option>
	     <?php
	      while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
	      	
	        print("<option value='".$result['Name']."'>".$result['Name']."</option>");
	      }
	      echo "</select>";?>
	  </div>
	</div>
		<div class="a a1 input-field">
		<input id="lot" name="lot" type="text" class="validate" autocomplete="off">
          <label class="active" for="lot">Batch Number</label>
        </div>

		<div class="a a1 input-field">

		<input id="qtt" name="Qtt" type="text" class="validate" autocomplete="off">
          <label class="active" for="qtt">Quantity</label>
        </div>
      
      <div class="rows">
        <button class="btn waves-effect waves-light green" type="submit" name="addsell">Save
    	<i class="material-icons right">send</i></button>
      </div>
  </div>
    </form>

  </div>
	<!--
	<div class="dashboardErrorAddEmployee">
		<p>lk,lknlnln</p>
	</div>
	-->
</div>