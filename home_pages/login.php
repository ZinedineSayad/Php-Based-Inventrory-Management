<?php
	include_once "home_functions/login.func.php";
	if(isset($_POST['submit']))
	{
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		if(!empty($email) && !empty($password))
		{
			loginAdmin($email, $password);
		}else{
			?>
				<div class="loginError">
					<div class="card red">
						<div class="card-content white-text">
							<p>Fill all the fields</p>
						</div>
					</div>
				</div>

			<?php
		}
	}
?>


<!-- Admin Form-->
<div class="loginAsAdminForm">
	<form action="index.php?page=login" method="POST">
	
		<div class="row">
			<div class="col s12 m12">
				<input type="email" name="email" placeholder="Admin Email" autocomplete="off">
			</div>
		</div>

		<div class="row">
			<div class="col s12 m12">
				<input type="password" name="password" placeholder="password" maxlength="20">
			</div>


		</div>
			<div class="row">
				<div class="col s12 m6">
					<input type="submit" id="a" name="submit" value="Login as Admin" class="btn wave-effect wave-light red">
				</div>
			</div>

	</form>
</div>


<?php 
include_once "home_functions/login.func.php";
 if(isset($_POST['send']))
	{
		$uname = htmlspecialchars($_POST['Username']);
		$pword = htmlspecialchars($_POST['user_password']);
		
		if(!empty($uname) && !empty($pword))
		{
			loginUser($uname, $pword);
		}else{
			?>
				<div class="loginError">
					<div class="card red">
						<div class="card-content white-text">
							<p>Fill all the fields</p>
						</div>
					</div>
				</div>

			<?php
		}
	}
?>


<!--Employee form-->
<div class="loginAsEmployeeForm">
	<form action="index.php?page=login" method="POST">
	
		<div class="row">
			<div class="col s12 m12">
				<i class="material-icons prefix">account_circle</i><input type="text" name="Username" placeholder="User name" autocomplete="off">
			</div>
		</div>

		<div class="row">
			<div class="col s12 m12">
				<input type="password" name="user_password" placeholder="user password" maxlength="20">
			</div>


		</div>
			<div class="row">
				<div class="col s12 m6">
					<input type="submit" name="send" value="Login as Employee" class="btn wave-effect wave-light red">
				</div>
			</div>

	</form>
</div>	




