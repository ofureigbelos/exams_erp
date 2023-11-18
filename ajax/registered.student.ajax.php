<?php

require_once "../connections/pdo-connection.php";

if(isset($_POST["coscode"])){

	$course_code 	= $_POST["coscode"];
	$acade_session	= $_POST["session"];

	$query = "SELECT * FROM courseregistration 
	JOIN schoolcourse
	ON courseregistration.course_Id = schoolcourse.course_Id
	 WHERE courseregistration.course_Id = '$course_code' AND Session = '$acade_session'";

	$stmt  = Connection::Connect()->prepare($query);

	if($stmt->execute()){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			$data[] = $row;
		}

		echo json_encode($data);

	}
}