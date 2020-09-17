<?php
	include_once "admin_functions/manageEmployee.func.php"

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

	<h1 class="flow-text" style="text-align: center;"><b>Manage Employees</b></h1>

	
			<table class="highlight" style="font-size: 0.8em;">
		        <thead>
		          <tr class="blue-text text-darken">
		          	  <th>id</th>
		              <th>Employee's Name</th>
		              <th>Employee's Password</th>
		              <th>Date of join</th>
		              <th><a href="#" id="modifyEmployee"><b>Modify</b></a></th>
		              <th><a href="#!" id="delateEmployees"><b>Delete</b></a></th>

		          </tr>
		        </thead>
		        <?php
		foreach (display_employee() as $employee)
	{
		?>
		        <tbody>
		          <tr> 
		          	<td><?=$employee['id_emp'];?></td>
		            <td><?=$employee['name_emp']?></td>
		            <td><?=$employee['password_emp']?></td>
		            <td><?= date("d-m-Y @ h:i", strtotime($employee['date_emp']))?></td>
		            <td><i class="material-icons ">edit</i></a></td>
		            <td><i id="herealso" class="material-icons ">delete</i></td>

		          </tr>


		        </tbody>


		<?php
}
		if(isset($_POST['updateEmployee']))
		{
			$name_emp = htmlspecialchars($_POST['name_emp']);
			$password_emp = htmlspecialchars($_POST['password_emp']);
			$id_emp= htmlspecialchars($_POST['id_emp']);
			if(!empty($name_emp) && !empty($password_emp))
			{
				update($id_emp, $name_emp, $password_emp);
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

		<?php
		if(isset($_POST['delateEmp'])){
			global $db;
			$sql = "DELETE FROM employee WHERE id_emp =  :id";
			$stmt = $db->prepare($sql);
			  
			$stmt->execute(array('id' =>$_POST['id_emp']));
		}
		?>



<div class="updatePostEmploueeManagement">

	<form action="index.php?page=manageEmployee" method="POST">
		<div class="row">
				<div class="col s12 m12">
					<input type="text" name="id_emp" placeholder="id employee" autocomplete="off">
				</div>
			</div>
		<div class="row">
			<div class="col s12 m12">
				<input type="text" name="name_emp" placeholder="Employee's Name" autocomplete="off">
			</div>
		</div>

		<div class="row">
			<div class="col s12 m12">
				<input type="password" name="password_emp" placeholder="Employee's Password" maxlength="12">
			</div>

		</div>
			<div class="row">
				<div class="col s12 m12">
					<button type="submit" name="updateEmployee" id="reload" class="btn wave-effect wave-light green" onclick="location.reload();">Save</button>
					
				</div>
			</div>
			<div class="row">
				
				<div class="col s12 m6">
				<input type="submit" name="concel" value="Concel" class="btn wave-effect wave-light red"></a>
				</div>
			</div>
		</form>
	</div>
<div class="delateEmployeeform">
<p>do you want to delate an employee ? please set the identifier</p>
	<form action="index.php?page=manageEmployee" method="POST">
		<div class="row">
				<div class="col s12 m12">
					<input type="text" name="id_emp" placeholder="identifier" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<input type="submit" name="delateEmp" value="Remove" class="btn wave-effect wave-light red">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<input type="submit" name="concelEmp" value="concel" class="btn wave-effect wave-light red">
				</div>
			</div>

	</form>
</div>