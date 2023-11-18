<?php

require_once "../connections/pdo-connection.php";

if(isset($_POST["hidden_id"])){

	$matno		= $_POST["matricNo"];
	$fstest 	= $_POST["fTest"];
	$sectest 	= $_POST["sTest"];
	$examsc 	= $_POST["examScore"];
	$hidden_id	= $_POST["hidden_id"];
	$session 	= $_POST["session_id"];

	for($j = 0; $j < count($hidden_id); $j++ ){

		$sumtota = $fstest[$j] + $sectest[$j] + $examsc[$j];

		#var_dump($sumtota);

		$data = array(
		':matnumb'	=> $matno[$j],
		':firtest'	=> $fstest[$j],
		':sectest'	=> $sectest[$j],
		':exmscor'	=> $examsc[$j],
		':hidden'	=> $hidden_id[$j],
		':session' 	=> $session[$j]
	);
		$query = "UPDATE courseregistration SET MatriculationNo = :matnumb, FirstTest = :firtest, SecondTest = :sectest, ExamScore = :exmscor, Total = :firtest + :sectest + :exmscor WHERE Id = :hidden";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> execute($data);
	}

}