<?php

function debug ($param) {
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

session_start();

$config = parse_ini_file("config.ini");
setConfig($config["environment"]);

$path = explode('/', $_SERVER['REQUEST_URI']);

// debug($path);

include $_SESSION["root"].'routes.php';

function setConfig($config) {
	switch($config) {
		case "prod":
			$_SESSION["root"] = "/var/task/user/api/";
			$_SESSION["routes_variable"] = 0;
			break;
	
		case "keilolaptop":
			$_SESSION["root"] = "C:/xampp/htdocs/SiteTC1/api/";
			$_SESSION["routes_variable"] = 2;
			break;
	
		case "alex":
			$_SESSION["root"] = "C:/xampp/htdocs/tc1/SiteTC1/api/";
			$_SESSION["routes_variable"] = 3;
			break;
	
	}
}

?>