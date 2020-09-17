<?php
	include_once "admin_functions/addEmployee.func.php";
	if(isset($_POST['addEmployee']))
	{
		$name_emp = htmlspecialchars(trim($_POST['name_emp']));
		$password_emp = htmlspecialchars(trim($_POST['password_emp']));
		if(!empty($name_emp)  && !empty($password_emp))
		{
			insertRegisterData($name_emp, $password_emp);
			?>
				<div class="dashboardsuccessAddEmployee">
						<p><?php echo "Employee Added Succesfully";?></p>
					</div>
			<?php

		}else{
			
				?>

					<div class="dashboardErrorAddEmployee">
						<p><?php echo "Fill all the fields";?></p>
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

<div class="dashboardCore">

	<h1 class="flow-text">Add a new Employee</h1>

	<form action="index.php?page=addEmployee" method="POST">
	
		<div class="row">
			<div class="col s12 m12">
				<input type="text" name="name_emp" placeholder="Employee's Name" autocomplete="off">
			</div>
		</div>

		<div class="row">
			<div class="col s12 m12">
				<input type="password" name="password_emp" placeholder="Employee's Password">
			</div>


		</div>
			<div class="row">
				<div class="col s12 m6">
					<input type="submit" name="addEmployee" value="ADD EMPLOYEE" class="btn wave-effect wave-light red">
				</div>
			</div>

	</form>
	<!--
	<div class="dashboardErrorAddEmployee">
		<p>lk,lknlnln</p>
	</div>
	-->
</div>