<?php
require_once './libs/FrontController.php';
header('Access-Control-Allow-Origin: http://localhost:7000');
header("Access-Control-Allow-Methods : GET,POST,PUT,DELETE,OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$app = new FrontController();
$app->run();