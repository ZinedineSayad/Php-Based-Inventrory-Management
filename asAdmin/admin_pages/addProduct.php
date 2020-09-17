<?php
	include_once "admin_functions/addProduct.func.php";
	if(isset($_POST['addProduct']))
	{
		
	global $db;

		$req = $db->query("  SELECT 	id_emp
							 FROM 	employee 
							 where name_emp='manager'");

		$results=[];
		$response = $req->fetch();
		$results = $response;
		$id=$results[0];
		//$_SESSION['off']=$id;
		$req->closeCursor();
		$Nlot=htmlspecialchars(trim($_POST['n_lot']));
		$P_name=htmlspecialchars(trim($_POST['Pname']));
		$Edate=htmlspecialchars(trim($_POST['E_date']));
		$P_ppa=htmlspecialchars(trim($_POST['Ppa']));
		$p_qtt=htmlspecialchars(trim($_POST['Qtt']));
		$P_dosage=htmlspecialchars(trim($_POST['Dge']));
		$P_condi=htmlspecialchars(trim($_POST['con']));
		
		if(!empty($Nlot ) && !empty($P_name) && !empty($Edate) && !empty($P_ppa) && !empty($p_qtt) &&  !empty($P_dosage) && !empty($P_condi) )
		{
			 global $db;
            $t= $db-> prepare("SELECT N_lot FROM product where N_lot= :lot");
            $t->execute(array('lot' =>$Nlot));
            $answer= $t->fetch();

          if($answer){?>
            <div class="dashboardErrorAddEmployee">
                  <p><?php echo "Batch number already exists click to update";?></p>
                </div><?php
          }
          else{ 
            insertRegisterData($id, $Nlot, $P_name, $Edate, $P_ppa, $p_qtt, $P_dosage, $P_condi);
            ?>
              <div class="dashboardsuccessAddProduct">
                  <p><?php echo "Product Added Succesfully";?></p>
                </div>
            <?php
          }
            

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

<div class="dashboardCore" >
		<h1 class="flow-text"><i class="material-icons prefix">mode_edit</i>Add new Product</h1>
<div class="row">
	<form class="col s12" action="index.php?page=addProduct" method="POST">
      <div class="rows">
        
        <div class="a a1 input-field">
          <input id="nlot" name="n_lot" type="text" class="validate" autocomplete="off">
          <label class="active" for="nlot">Batch Number</label>
        </div>
        <div class="a a1 input-field">
          <input id="pname" name="Pname" type="text" class="validate" autocomplete="off">
          <label class="active" for="pname">Product Name</label>
        </div>
      </div>
      <div class="rows">
        <div class="input-field">
          <input class="datepicker"  id="edate" name="E_date" type="date" class="validate" autocomplete="off">
          <label class="active" for="edate">Expiry date</label>
        </div>
      </div>
      <div class="rows">
      	<div class="a input-field">
          <input id="ppa" name="Ppa" type="text" class="validate" autocomplete="off">
          <label class="active" for="ppa">Purchase price</label>
        </div>
		<div class="a a1 input-field">
          <input id="qtt" name="Qtt" type="text" class="validate" autocomplete="off">
          <label class="active" for="qtt">Quantity</label>
        </div>
        
      <div class="rows">
        
        <div class="a input-field">
          <input id="dosage" name="Dge" type="text" class="validate" autocomplete="off">
          <label class="active" for="dosage">Dosage</label>
        </div>
        <div class="a a1 input-field">
          <input id="co" name="con" type="text" class="validate" autocomplete="off">
          <label class="active" for="co">Conditionning</label>
        </div>
      </div>
      <div class="rows">
        <button class="btn waves-effect waves-light green" type="submit" name="addProduct">Save
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