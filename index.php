<?php

try {

  define('DS', DIRECTORY_SEPARATOR);
  define('BASE_PATH', __DIR__ . DS);

  require BASE_PATH.'vendor/autoload.php';

  $app		= System\App::instance();
  $app->request  	= System\Request::instance();
  $app->route	= System\Route::instance($app->request);

  $route		= $app->route;

  header("content-type: application/json");

  $route->get('/average', function() {
    if ($_GET['secret'] != $_ENV['SECRET_KEY']) {
      http_response_code(401);
      echo json_encode("Unauthorised");
      return;
    }
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($_ENV['EMAIL_FROM'], "COM3505 SERVER CLIENT");
    $email->setSubject("Your latest average temperature reading");
    $email->addTo($_ENV['EMAIL_TO'], "unPhone User");
    $email->addContent("text/plain", "The average temperature reading is " . ((float) $_GET['temp']) . "°C");
    $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
    try {
      $response = $sendgrid->send($email);
      echo json_encode("Sent");
    } catch (Exception $e) {
      echo json_encode(['exception' => $e->getMessage()]);
    }
  });

  $route->get('/max', function() {
    if ($_GET['secret'] != $_ENV['SECRET_KEY']) {
      http_response_code(401);
      echo json_encode("Unauthorised");
      return;
    }
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($_ENV['EMAIL_FROM'], "COM3505 SERVER CLIENT");
    $email->setSubject("Your latest max temperature reading");
    $email->addTo($_ENV['EMAIL_TO'], "unPhone User");
    $email->addContent("text/plain", "The max temperature reading is " . ((float) $_GET['temp']) . "°C");
    $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
    try {
      $response = $sendgrid->send($email);
      echo json_encode("Sent");
    } catch (Exception $e) {
      echo json_encode(['exception' => $e->getMessage()]);
    }
  });

  $route->get('/centre', function() {
    if ($_GET['secret'] != $_ENV['SECRET_KEY']) {
      http_response_code(401);
      echo json_encode("Unauthorised");
      return;
    }
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($_ENV['EMAIL_FROM'], "COM3505 SERVER CLIENT");
    $email->setSubject("Your latest centre screen temperature reading");
    $email->addTo($_ENV['EMAIL_TO'], "unPhone User");
    $email->addContent("text/plain", "The temperature reading at the centre of the screen is " . ((float) $_GET['temp']) . "°C");
    $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
    try {
      $response = $sendgrid->send($email);
      echo json_encode("Sent");
    } catch (Exception $e) {
      echo json_encode(['exception' => $e->getMessage()]);
    }
  });

  $route->any('/*', function() {
    http_response_code(404);
    echo json_encode("404 Not found");
  });

  $route->end();
} catch (Exception $e) {
  echo json_encode(['exception' => $e->getMessage()]);
}