<?php

require __DIR__ . "/../vendor/autoload.php";


use CoffeeCode\Router\Router;

$router = new Router(ROOT);
/*
 * routes
 * The controller must be in the namespace App\Httpd\Controller
 * this produces routes for route, route/$id, route/{$id}/customer, etc.
 */
$router->group(null)->namespace("App\Http\Controllers");
$router->get("/customer", "CustomerController:show");
$router->post("/customer", "CustomerController:store");
$router->post("/customer/{id}", "CustomerController:update");
$router->delete("/customer/{id}", "CustomerController:destroy");



/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("error");
$router->get("/{errcode}", "CustomerController:error");

/**
 * Execute the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}