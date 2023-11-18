<?php

require_once "../controllers/schoolcourse.controller.php";
require_once "../models/schoolcourse.model.php";

class AjaxCheckTeller{

	/*=============================================
	VALIDATE IF USER ALREADY EXISTS
	=============================================*/

	public $validateTeller;

	public function ajaxValidateTeller(){

		$item = "TellerId";
		$value = $this->validateTeller;

		$answer = ControllerCourses::ctrShowRegCourses($item, $value);

		echo json_encode($answer);

	}

}


/*=============================================
VALIDATE IF USER ALREADY EXISTS PHP POST
=============================================*/


if (isset($_POST["validateTeller"])) {

	$valTelno = new AjaxCheckTeller();
	$valTelno -> validateTeller = $_POST["validateTeller"];
	$valTelno -> ajaxValidateTeller();
}