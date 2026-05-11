<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

/*
  Load environment variables from .env file
 */

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/*
  Define constants for paths and database configuration
 */

define('BASE_PATH', dirname(__DIR__) . '/');

define('APP_PATH', BASE_PATH . 'app/');
define('VIEW_PATH', APP_PATH . 'views/');
define('CONTROLLER_PATH', APP_PATH . 'controllers/');
define('MODEL_PATH', APP_PATH . 'models/');

define('PUBLIC_PATH', BASE_PATH . 'public/');

define('APP_URL', $_ENV['APP_URL']);

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_DATABASE', $_ENV['DB_DATABASE']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);