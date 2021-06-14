<?php

ob_start();
session_start();

use Dotenv\Dotenv;

// Constant Pathes
define('PRIVATE_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('PAGES_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR);

// GENERATE AUTOLOAD FILES
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// CREATE DOTENV ENVIROMENT
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// create database connection
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';
$database = new Database($_ENV['DB_SERVER'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
$connection = $database->connect();

//Authentication
