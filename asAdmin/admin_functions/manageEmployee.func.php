<?php

function display_employee()
	{
		global $db;

		$req = $db->query(" SELECT 		employee.id_emp,
										employee.name_emp,
										employee.password_emp,
										employee.date_emp
							FROM employee ORDER by employee.id_emp asc
							

			");

		$results = [];
		while($response = $req->fetch())
		{
			$results[] = $response;
		}

		return $results;
		$req->close();
	}

// function to update the employees

function update($id, $name_emp, $password_emp) {
       global $db;
        $user = [
            ':id_emp' => $id,
            ':name_emp' => $name_emp,
            ':password_emp' => $password_emp];
 
 
        $sql = 'UPDATE employee
                    SET name_emp      = :name_emp,
                         password_emp  = :password_emp

                  WHERE id_emp = :id_emp';
 
        $q = $db->prepare($sql);
 
        return $q->execute($user);
    }
 

















	?>



