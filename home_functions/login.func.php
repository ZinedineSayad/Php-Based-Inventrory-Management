<?php
include "connect_db.php";
	function loginAdmin($email, $password)
	{
	global $db;
 		$sql= "SELECT * FROM manager WHERE email = '$email' AND password = '$password'";
        $query = $db->prepare($sql);
        $query->execute(array(
        	"email" => $email,
        	 "password"=> $password
        	));
        $row = $query->fetchAll();
        
        if($row) {
            
            $_SESSION['logged'] = true;
            $_SESSION['mail'] = $email; 
            
            header("location: asAdmin/index.php");
            
            exit;
        } else {
			?>
		<div class="loginError">
		<div class="card green">
			<div class="card-content white-text">
				<p>incorect email or password</p>
			</div>
		</div>
		</div>
        <?php

    }
}

function loginUser($name_emp, $password_emp){
 		global $db;
 		$sql= "SELECT id_emp, name_emp, password_emp FROM employee WHERE name_emp = '$name_emp' AND password_emp = '$password_emp' ";
        $query = $db->prepare($sql);
        $query->execute(array(
        	"name_emp" => $name_emp,
        	 "password_emp"=> $password_emp
        	));

        /*$getUsers = $db->prepare("SELECT * FROM users ORDER BY id ASC");
        $getUsers->execute();*/
        $row = $query->fetch(PDO::FETCH_ASSOC);
        

        if($row) {
            
            $_SESSION['name_emp'] = $name_emp;
            $_SESSION['id_emp'] = $row['id_emp'];

            header("location: asEmployee/index.php");
        } else {
			?>
		<div class="loginError">
		<div class="card green">
			<div class="card-content white-text">
				<p>incorrect User name or password</p>
			</div>
		</div>
		</div>
        <?php
    }

}


?>