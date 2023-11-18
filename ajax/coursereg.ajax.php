<?php

require "../connections/mysqli-connection.php";

if(isset($_POST["cosId"])){

	$tellerNum	= $_POST["teller"];
	$matNum		= $_POST["matno"];
	$regSession = $_POST["session"];
	$checkId	= $_POST["cosId"];

	for ($j=0; $j < count($checkId); $j++) {

$stm  = $con->query("SELECT * FROM courseregistration WHERE MatriculationNo = '{$matNum[$j]}' AND Session = '$regSession'");
		//$stm->execute($dat);
}

		$row = mysqli_num_rows($stm);

		if($row > 0){

					echo "Error !!";

		}else{
			for($i = 0; $i < count($checkId); $i++){

				$query = "INSERT INTO courseregistration(TellerId, MatriculationNo, Session, course_Id) VALUES('{$tellerNum}', '{$matNum[$i]}', '{$regSession}', '{$checkId[$i]}')";

				$stmt = $con->query($query);
			}

			echo json_encode($stmt);
		}


}