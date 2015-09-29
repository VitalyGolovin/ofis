<?php

define('OFIS',true);//для организации доступа чз index.php

header("Content-Type:text/html;charset=utf-8");

require 'config.php';

set_include_path(get_include_path().PATH_SEPARATOR.CONTROLLER.PATH_SEPARATOR.MODEL);

function __autoload($class_name){
	include_once($class_name.'.php');
};

$ofis = RouteController::getInstance();

$ofis->route();


?>