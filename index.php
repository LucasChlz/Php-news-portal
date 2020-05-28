<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_INI);

$router->namespace("Source\Controllers");

$router->group("/");

$router->get("/", "PortalController:home");

$router->get("/news/{slugNews}", "PortalController:news");
$router->post("/news/{slugNews}", "PortalController:news");

$router->group("/painel");

$router->get("/", "PainelController:home");
$router->post("/", "PainelController:home");

$router->get("/news/edit/{slugNews}", "PainelController:newsSingle");
$router->post("/news/edit/{slugNews}", "PainelController:newsSingle");

$router->get("/category", "PainelController:category");
$router->post("/category", "PainelController:category");

$router->get("/category/{slugCategory}", "PainelController:categorySingle");
$router->post("/category/{slugCategory}", "PainelController:categorySingle");


$router->dispatch();