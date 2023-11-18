<?php

require_once "../connections/pdo-connection.php";

if(isset($_POST["dept"])){

	$school = $_POST["dept"];
	$alevel = $_POST["levl"];
	$sessio = $_POST["sess"];

	$query = "SELECT DISTINCT courseregistration.MatriculationNo, students.level, students.department FROM courseregistration JOIN students ON courseregistration.MatriculationNo = students.matric WHERE students.department = '$school' AND students.level = '$alevel' AND courseregistration.Session = '$sessio'";


	$stmt  = Connection::Connect()->prepare($query);

	if($stmt->execute()){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			$data[] = $row;
		}

		echo json_encode($data);

	}
}
