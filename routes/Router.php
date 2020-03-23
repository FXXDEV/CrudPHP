<?php

require __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

define("BASE", "http://localhost:8080/");
$router = new Router(BASE);
//http://localhost:8080/customer
/**
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$router->group(null)->namespace("App\Http\Controllers;");
$router->get("/customer", "CustomerController:show");
$router->post("/customer", "CustomerController:store");
$router->put("/customer/{id}", "CustomerController:update");
$router->delete("/customer/{id}", "CustomerController:destroy");
// $router->post("/route/{id}", "Controller:method");
// $router->put("/route/{id}/profile", "Controller:method");
// $router->patch("/route/{id}/profile/{photo}", "Controller:method");
// $router->delete("/route/{id}", "Controller:method");


/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("error");
$router->get("/{errcode}", "CustomerController:error");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}