<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_INI);

$router->namespace("Source\Controllers");

$router->group("/");
$router->get("/", "PortalController:portalHome");

$router->dispatch();