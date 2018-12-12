<?php

require_once __DIR__ . "/lib/FrontController.php";

session_start();

date_default_timezone_set("America/Sao_Paulo");

$options = array();

$frontController = new FrontController();
$frontController->run();
