<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new \Test\Routing\Router();

$router->addControllers([\Test\Routes\MainController::class, \Test\Routes\CopyController::class]);

$router->start();