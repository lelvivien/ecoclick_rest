<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require   __DIR__ . '/../src/config/db.php';
//  error_reporting(E-ERROR | E_PARSE);
$app = AppFactory::create();
$app->addRoutingMiddleware();
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);
$app->setBasePath("/ecoclick_rest/public");

// $app->options('/{routes:.+}', function ($request, $response, $args) {
//     return $response;
// });


// $app->add(function ($request, $handler) {
//     $response = $handler->handle($request);
//     return $response
//             ->withHeader('Access-Control-Allow-Origin', '*')
//             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
//             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
// });
$app->get('/hello/{name}', function (Request $request, Response $response,array $args) {
    $name =$args['name'];
    $response->getBody()->write("Hello World $name ");
    return $response;
});
//cusyomers routes
 require '../src/routes/customers.php';

$app->run();

