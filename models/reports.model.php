<?php

require_once "connections/pdo-connection.php";

class ReportsModel{

	public static function mdlShowSemesterHeader($table1, $table2, $data){

		$query = "SELECT DISTINCT CourseCode FROM $table1 JOIN $table2 ON $table1.course_Id = $table2.course_Id WHERE Department = :dept AND Level = :leve AND Semester = :term  AND Session = :year";

		$header = Connection::Connect()->prepare($query);

		$header -> bindParam(':dept', $data['dept'], PDO::PARAM_STR);
		$header -> bindParam(':leve', $data['leve'], PDO::PARAM_STR);
		$header -> bindParam(':term', $data['term'], PDO::PARAM_STR);
		$header -> bindParam(':year', $data['year'], PDO::PARAM_STR);
        
		if($header -> execute()){

			while ($row = $header -> fetch(PDO::FETCH_ASSOC) ) {
				
				$data[] = $row;
			}

			return $data;

		}else{

			return 'error';
		}

		$header -> close();
		$header = null;

	}
}