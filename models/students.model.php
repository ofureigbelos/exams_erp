<?php

require_once "connections/pdo-connection.php";

class StudentsModel {

	public static function mdlShowStudents($table, $item, $value){

		if($item != null){

			$query = "SELECT * FROM $table WHERE $item = :$item";

			$stmt  = Connection::Connect()->prepare($query);

			$stmt  -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt  -> execute();

			return $stmt  -> fetch();

		}else{

		$query = "SELECT * FROM $table WHERE 1";

		$stmt  = Connection::Connect()->prepare($query);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}

		$stmt -> close();

		$stmt  = null;
	}


	public static function mdlAddStudent($table, $data){

		$query = "INSERT INTO $table(photo, matric, firstname, lastname, middlename, gender, dob, maritalstatus, maidenname, department, level, session, postprimary, postprimarydate, qualification, qualificationdate, state, localgov, homeadd, phonenumber, postaladdress, sponsorname, sponsoraddress, sponsorphone, nextofkin, nextkinaddress, nextofkinphone) VALUES(:photo, :matno, :fname, :lname, :mname, :gende, :bdate, :marit, :maide, :depmt, :level, :seson, :pryma, :pryda, :qualy, :quada, :state, :local, :home, :phone, :posta, :spona, :spodd, :spohn, :kin_n, :kin_a, :kin_p)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> bindParam(':photo', $data['photo'], PDO::PARAM_STR);
		$stmt -> bindParam(':matno', $data['matno'], PDO::PARAM_STR);
		$stmt -> bindParam(':fname', $data['fname'], PDO::PARAM_STR);
		$stmt -> bindParam(':lname', $data['lname'], PDO::PARAM_STR);
		$stmt -> bindParam(':mname', $data['mname'], PDO::PARAM_STR);
		$stmt -> bindParam(':gende', $data['gende'], PDO::PARAM_STR);
		$stmt -> bindParam(':bdate', $data['bdate'], PDO::PARAM_STR);
		$stmt -> bindParam(':marit', $data['marit'], PDO::PARAM_STR);
		$stmt -> bindParam(':maide', $data['maide'], PDO::PARAM_STR);
		$stmt -> bindParam(':depmt', $data['depmt'], PDO::PARAM_STR);
		$stmt -> bindParam(':level', $data['level'], PDO::PARAM_STR);
		$stmt -> bindParam(':seson', $data['seson'], PDO::PARAM_STR);
		$stmt -> bindParam(':pryma', $data['pryma'], PDO::PARAM_STR);
		$stmt -> bindParam(':pryda', $data['pryda'], PDO::PARAM_STR);
		$stmt -> bindParam(':qualy', $data['qualy'], PDO::PARAM_STR);
		$stmt -> bindParam(':quada', $data['quada'], PDO::PARAM_STR);
		$stmt -> bindParam(':state', $data['state'], PDO::PARAM_STR);
		$stmt -> bindParam(':local', $data['local'], PDO::PARAM_STR);
		$stmt -> bindParam(':home', $data['home'], PDO::PARAM_STR);
		$stmt -> bindParam(':phone', $data['phone'], PDO::PARAM_STR);
		$stmt -> bindParam(':posta', $data['posta'], PDO::PARAM_STR);
		$stmt -> bindParam(':spona', $data['spona'], PDO::PARAM_STR);
		$stmt -> bindParam(':spodd', $data['spodd'], PDO::PARAM_STR);
		$stmt -> bindParam(':spohn', $data['spohn'], PDO::PARAM_STR);
		$stmt -> bindParam(':kin_n', $data['kin_n'], PDO::PARAM_STR);
		$stmt -> bindParam(':kin_a', $data['kin_a'], PDO::PARAM_STR);
		$stmt -> bindParam(':kin_p', $data['kin_p'], PDO::PARAM_STR);

		if($stmt -> execute()){

			return 'ok';

		}else{

			return 'error';
		}

		$stmt -> close();
		$stmt = null;

	}
}