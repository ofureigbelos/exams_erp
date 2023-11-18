<?php

require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/students.controller.php";
require_once "controllers/schoolcourse.controller.php";

require_once "models/users.model.php";
require_once "models/students.model.php";
require_once "models/schoolcourse.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();