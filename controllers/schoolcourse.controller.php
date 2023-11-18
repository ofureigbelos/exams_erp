<?php

class ControllerCourses{

	public static function ctrCreateCourses(){
		if(isset($_POST["submit"])){

			$schoool 	= $_POST["department"];
			$level		= $_POST["class"];
			$cosCode	= $_POST["courseCode"];
			$cosTittle 	= $_POST["courseTittle"];
			$cosUnit 	= $_POST["courseUnit"];
			$semester 	= $_POST["semester"];

			$table 	= "schoolcourse";

			$data 	= array(
				'dept'  => $schoool,
				'class' => $level,
				'code'  => $cosCode,
				'tittle'=> $cosTittle,
				'unit'  => $cosUnit,
				'term'  => $semester
			);

			$answer = CourseModel::mdlAddCourses($table, $data);

			if($answer == "ok"){

				echo '<script>
						swal({
							type: "success",
							title: "¡Courses Added Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){

								if(result.value){
									window.location = "school-courses";
								}

							});

						</script>';
			}else{

				echo '<script>
						swal({
							type: "error",
							title: "¡Course Data Not Sent!",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){

								if(result.value){
									window.location = "school-courses";
								}

							});

						</script>';
			}
		}
	}

	public static function ctrShowCoursesTable($item, $value){

		$table  = "schoolcourse";

		$answer = CourseModel::mdlShowCoursesTable($table, $item, $value);

		return $answer;

	}

	public static function ctrShowCourses($item1, $value1, $item2, $value2){

		$table  = "schoolcourse";

		$answer = CourseModel::mdlShowSchoolCourse($table, $item1, $value1, $item2, $value2);

		return $answer;

	}
	

	public static function ctrShowCarryOverCourses($oitem1, $ovalue, $oitem2, $ovalu2){

		$table  = "courseregistration";

		$answer = CourseModel::mdlShowCarryOverCourse($table, $oitem1, $ovalue, $oitem2, $ovalu2);

		return $answer;

	}


	/*	============================================
					Show Reg Courses
	============================================ */

	public static function ctrShowRegCourses($item, $value){

		$table = "courseregistration";

		$answer = CourseModel::mdlShowRegCourses($table, $item, $value);

		return $answer;
	}


}

?>