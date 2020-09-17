<?php
	include_once "admin_functions/manageProduct.func.php";
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
<head>
  <style type="text/css">
   
    table {

      margin: auto;
      font-family: "Lucida Sans Unicode", "calibri", "Segoe Ui";
      font-size: 20px;
    }

    table td {
      transition: all .5s;
    }
    .ne:hover{
    	text-decoration:underline; 
    }
  </style>
</head>
<div class="dashboardCore">

	<h1 class="flow-text" style="text-align: center;"><b>List of Product</b></h1>

			<table class="highlight data-table" style="font-size: 0.85em;">
		        <thead style="background-color: #508abb; color: #FFFFFF; border-color: #6ea1cc !important;" >

		          <tr class="white-text text-darken">
		          	  <th>Added_By</th>
		          	  <th>Batch</th>
		              <th>P_Name</th>
		              <th>Expiration</th>
		              <th>Quantity</th>	
		              <th>Cost_Per_Unit</th>	<!--prix public algerien use select sum(PPA) from product where-->
		              <th><a class="ne" href="#" id="modifyProduct"><b>Modify</b></a></th>
		              <th><a class="ne" href="#!" id="removeProduct"><b>Delete</b></a></th>
		          </tr>
		        </thead>
		        <?php
		        
		$total  = 0;
		foreach (display_product() as $product)
	{
		?>
		        <tbody>
		        <tr><!--title="<?php echo $product['name_emp'] ?>"-->
		          	<td><?=$product['name_emp']?></td>
		            <td><?=$product['N_lot']?></td>
		            <td> <?=$product['Name']?></td>
		            <td><?=$product['Edate']?></td>
		            <td style="padding-left: 20px;"><?=$product['Qtt']?></td>
		            <td><?=$product['PPA']?></td>
		            <!--<td><?= date("d-m-Y @ h:i", strtotime($product['Edate']))?></td>-->
		            
					<td><i class="material-icons ">edit</i></a></td>
		            <td><i class="material-icons ">delete</i></td>
		          </tr>
		      </tbody>
			      

		<?php
}
	
		            foreach($db->query('SELECT SUM(total_cost) FROM product') as $row) {
				
				 		$total =$row['SUM(total_cost)'];
				
						}
	?>
		
				
				      <tr>
				        <th colspan="5">TOTAL</th>
				        <th><?=number_format($total, 2, ',', ' ')?></th>
				      </tr>
    			  
    <?php if(isset($_POST['updateProduct']))
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

			if(isset($_POST['delateProduct'])){
				$lot=htmlspecialchars(trim($_POST['lot']));

				if(!empty($lot)){
					delate_Product($lot);
					
				}else{?>
				<div class="dashboardErrorAddEmployee">
						<p><?php echo "please enter Batch number";?></p>
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
		<h1 class="flow-text"><i class="material-icons prefix">mode_edit</i>Edit Product</h1>

	<form class="col s12" action="index.php?page=manageProduct" method="POST">
      <div class="rows">
        
        <div class="a input-field">
          <input id="nlot" name="n_lot" type="text" class="validate" autocomplete="off">
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
          <input id="qtt" name="Qtt" type="text" class="validate" autocomplete="off">
          <label class="active" for="qtt"> Quantity</label>
        </div>
      </div>
      	<div class="row">
		<div class="col s12 m12">
			<button type="submit" name="updateProduct" id="reload" class="btn wave-effect wave-light green$"><i class="material-icons right">save</i>Save</button>
			</div>
		</div>
		 <div class="row">
	   <div class="col s12 m6">
		 <input type="submit" name="concel" value="Concel" class="btn wave-effect wave-light red"></a>
			</div>
		</div>
	</div>
    </form>

	</div>

<div class="delateProductform">
	<h1 class="flow-text "><i class="material-icons prefix">delete</i>Delete Product</h1>
<p>do you want to delate a product? please set the batch numbers <b>Otherwise click on Cancel</b></p>
	<form action="index.php?page=manageProduct" method="POST">
		<div class="row">
				<div class="col s12 m12">
					<input type="text" name="lot" placeholder="batch number" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<input type="submit" name="delateProduct" value="Remove" class="btn wave-effect wave-light red">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<input type="submit" name="concelProduct" value="concel" class="btn wave-effect wave-light red">
				</div>
			</div>
	</form>
</div>