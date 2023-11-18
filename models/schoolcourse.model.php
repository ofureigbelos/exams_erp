<?php
require_once "connections/pdo-connection.php";

class CourseModel{

	public static function mdlShowCoursesTable($table, $item, $value){

		if($item != null){

			$query = "SELECT * FROM $table WHERE $item = :$item";

			$stmt  = Connection::Connect()->prepare($query);

			$stmt  -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt  -> execute();

			return $stmt  -> fetch();

		}else{

		$query = "SELECT * FROM $table ORDER BY `Department`, `Level`, `Semester` ASC";

		$stmt  = Connection::Connect()->prepare($query);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}

		$stmt -> close();

		$stmt  = null;

	}

	public static function mdlShowSchoolCourse($table, $item1, $value1, $item2, $value2){

		$query = "SELECT * FROM $table WHERE $item1 = :$item1 AND $item2 = :$item2";

		$stmt  = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":".$item1, $value1);
		$stmt -> bindParam(":".$item2, $value2);

		if($stmt -> execute()){

			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC) ) {
				
				$data[] = $row;
			}

			return $data;
		}

		$stmt -> close();

		$stmt = null;
	}


	public static function mdlShowCarryOverCourse($table, $oitem1, $ovalue, $oitem2, $ovalu2){

		$query = "SELECT * FROM $table JOIN schoolcourse ON courseregistration.course_Id = schoolcourse.course_Id WHERE $oitem1 = :$oitem1 AND $oitem2 < :$oitem2";

		$stmt  = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":".$oitem1, $ovalue);
		$stmt -> bindParam(":".$oitem2, $ovalu2);

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);
			
		
		$stmt -> close();

		$stmt = null;
	}



	public static function mdlShowRegCourses($table, $item, $value){

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

	public static function mdlAddCourses($table, $data){

		$query = "INSERT INTO $table(CourseCode, CourseTittle, CourseUnit, Department, Level, Semester) VALUES(:code, :tittle, :unit, :dept, :class, :term)";

		$stmt  = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt -> bindParam(":tittle", $data["tittle"], PDO::PARAM_STR);
		$stmt -> bindParam(":unit", $data["unit"], PDO::PARAM_STR);
		$stmt -> bindParam(":dept", $data["dept"], PDO::PARAM_STR);
		$stmt -> bindParam(":class", $data["class"], PDO::PARAM_STR);
		$stmt -> bindParam(":term", $data["term"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return 'ok';

		}else{

			return 'error';
		}

		$stmt -> close();

		$stmt = null;
	}

}
?>