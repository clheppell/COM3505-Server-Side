<?php

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', __DIR__ . DS);

require BASE_PATH.'vendor/autoload.php';

$app		= System\App::instance();
$app->request  	= System\Request::instance();
$app->route	= System\Route::instance($app->request);

$route		= $app->route;

header("content-type: application/json");

$route->any('/', function() {
  echo json_encode("Test page");
});

$route->any('/*', function() {
  http_response_code(404);
  echo json_encode("404 Not found");
});

$route->end();