<?php

require_once "../connections/pdo-connection.php";

require_once "../controllers/students.controller.php";

require_once "../views/modules/student-list.php";



$item1  = "Department";
$value1 = $_SESSION["STUDENT_DEPT"];

$item2  = "Level";
$value2 = $_SESSION["STUDENT_LEVEL"];

$table  = "schoolcourse";

$query = "SELECT * FROM schoolcourse WHERE Department = $value1 AND Level = $value2";

$stmt  = Connection::Connect()->prepare($query);

if($stmt -> execute()){

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		$data[] = $row;
	}

	echo json_encode($data);
}

