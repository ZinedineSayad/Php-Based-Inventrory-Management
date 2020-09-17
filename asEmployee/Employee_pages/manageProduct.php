<?php
	session_start();
	include_once "employee_functions/manageProduct.func.php";
?>

<div class="dashboardMenu">
  <a href="index.php?page=addProduct" class="waves-effect waves-light btn"><i class="material-icons right">add_box</i>Add a Product</a>
  <a href="index.php?page=manageProduct" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>Manage Product</a>
  <a href="index.php?page=addSell" class="waves-effect waves-light btn"><i class="material-icons right">add_circle</i>Add sell</a>
  <!--view_list -->
  <a class="waves-effect waves-light btn"><i class="material-icons right">list</i>Product State</a>
</div>


<div class="dashboardCore">

	<h1 class="flow-text" style="text-align: center;"><b>List of Product</b></h1>

	
			<table class="highlight" style="font-size: 0.8em;">
		        <thead>
		          <tr class="blue-text text-darken">
		          	  
		          	  <th>Batch</th>
		              <th>Name</th>
		              <th>Expire Date</th>
		              <th>Quantity</th>
		              <th>Cost</th>	<!--prix public algerien use select sum(PPA) from product where-->   		              
		              <th><a href="#" id="modifyProd"><b>UpDate</b></a></th>

		          </tr>
		        </thead>
		        <?php
		foreach (display_product() as $product)
	{
		?>
		        <tbody>
		          <tr>
		          	
		            <td><?=$product['N_lot']?></td>
		            <td><?=$product['Name']?></td>
		            <td><?=$product['Edate']?></td>
		            <td><pre> <?=$product['Qtt']?></pre> </td>
		            <td><?=$product['PPA']?></td>
		            
		            <td><i class="material-icons ">edit</i></a></td>
		          </tr>


		        </tbody>


		<?php
}
		if(isset($_POST['updateProduct']))
		{
		$Nlot=htmlspecialchars(trim($_POST['n_lot']));
		$Edate=htmlspecialchars(trim($_POST['e_date']));
		$p_qtt=htmlspecialchars(trim($_POST['Qtt']));
			if(!empty($Nlot) && !empty($Edate) && !empty($p_qtt))
			{

				ubdate_product($Nlot, $Edate, $p_qtt);
			}else{?>
				<div class="dashboardErrorAddEmployee">
						<p><?php echo "Fill all the fields";?></p>
					</div><?php
			}
		}

	?>
       		</table>

	<!--
	<div class="dashboardErrorAddEmployee">
		<p>lk,lknlnln</p>
	</div>
	-->
</div>

<div class="updatePostProductManagement">
		<h1 class="flow-text"><i class="material-icons prefix">mode_edit</i>edit Product</h1>
<div class="row">
	<form class="col s12" action="index.php?page=manageProduct" method="POST">
      <div class="rows">
        
        <div class="a input-field">
          <input id="nlot" name="n_lot" type="text" class="validate">
          <label class="active" for="nlot">Batch Number</label>
        </div>
        
      <div class="rows">
        <div class="a input-field">
          <input class="datepicker"  id="edate" name="e_date" type="date" class="validate">
          <label class="active" for="edate">Expiry date</label>
        </div>
      </div>
         
      <div class="rows">

		<div class="a a1 input-field">
          <input id="qtt" name="Qtt" type="text" class="validate">
          <label class="active" for="qtt">Quantity</label>
        </div>
      </div>
      	<div class="row">
		<div class="col s12 m12">
			<button type="submit" name="updateProduct" id="reload" class="btn wave-effect wave-light green" onclick="location.reload();"><i class="material-icons right">save</i>Save</button>
			</div>
		</div>
		 <div class="row">
	   <div class="col s12 m6">
		 <input type="submit" name="concel" value="Concel" class="btn wave-effect wave-light red"></a>
			</div>
		</div>
    </form>
</div>