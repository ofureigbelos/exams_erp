<?php

require_once "../controllers/students.controller.php";
require_once "../models/students.model.php";

class AjaxStudent{

	/*=============================================
	VALIDATE IF USER ALREADY EXISTS
	=============================================*/

	public $validateMatno;

	public function ajaxValidateMatno(){

		$item = "matric";
		$value = $this->validateMatno;

		$answer = ControllerStudents::ctrShowStudents($item, $value);

		echo json_encode($answer);

	}

}


/*=============================================
VALIDATE IF USER ALREADY EXISTS PHP POST
=============================================*/


if (isset($_POST["validateMatno"])) {

	$valMatno = new AjaxStudent();
	$valMatno -> validateMatno = $_POST["validateMatno"];
	$valMatno -> ajaxValidateMatno();
}