<?php

require __DIR__ . "/../vendor/autoload.php";


// $controller = App
// $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//     $r->addRoute('GET', '/customer', 'get_all_users_handler');
//     // {id} must be a number (\d+)
//     // $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//     // // The /{title} suffix is optional
//     // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
// });

// // Fetch method and URI from somewhere
// $httpMethod = $_SERVER['REQUEST_METHOD'];
// $uri = $_SERVER['REQUEST_URI'];

// // Strip query string (?foo=bar) and decode URI
// if (false !== $pos = strpos($uri, '?')) {
//     $uri = substr($uri, 0, $pos);
// }
// $uri = rawurldecode($uri);

// $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
// switch ($routeInfo[0]) {
//     case FastRoute\Dispatcher::NOT_FOUND:
//         // ... 404 Not Found
//         break;
//     case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//         $allowedMethods = $routeInfo[1];
//         // ... 405 Method Not Allowed
//         break;
//     case FastRoute\Dispatcher::FOUND:
//         $handler = $routeInfo[1];
//         $vars = $routeInfo[2];
//         // ... call $handler with $vars
//         break;
// }

use CoffeeCode\Router\Router;

define("BASE", "https://www.localhost/CrudPHP/");
$router = new Router(BASE);
/*
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$router->group(null)->namespace("App\Http\Controllers");
$router->get("/customer", "CustomerController:show");
$router->post("/customer", "CustomerController:store");
$router->put("/customer/{id}", "CustomerController:update");
$router->delete("/customer/{id}", "CustomerController:destroy");



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