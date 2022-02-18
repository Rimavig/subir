<?php
//error_reporting(-1);
//ini_set('display_errors', 1);
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__.'/../Config/Auth.php';


$getContainer = new \DI\Container();
AppFactory::setContainer($getContainer);

$app = AppFactory::create();
$app->setBasePath('/apiRest1/corp');


$container = $app->getContainer();

require __DIR__.'/../Routes/authRoutes.php';
require __DIR__.'/../Config/Configs.php';
require __DIR__.'/../Config/Dependencies.php';


$app->run();
