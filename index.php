<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_INI);

$router->namespace("Source\Controllers");

$router->group("/");
$router->get("/", "PortalController:home");

$router->group("/painel");
$router->get("/", "PainelController:home");
$router->post("/", "PainelController:home");

$router->get("/category", "PainelController:category");
$router->post("/category", "PainelController:category");

$router->get("/category/{slugCategory}", "PainelController:category");


$router->dispatch();