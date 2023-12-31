<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// $app = AppFactory::create();
// $app->addRoutingMiddleware();
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);
// $app->setBasePath("/ecoclick_rest/public");

//get all customers 

$app->get('/api/customers',function(Request $request, Response $response){
    
    $sql = "SELECT * FROM clients";


    try{
        $db = new db();
        $db = $db->connect();
        $stmt= $db->query($sql);
        $clients = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $response->getBody()->write(json_encode($clients));
    }catch(PDOExeption $e){
        $response->getBody()->write($e);
    }

    


    return $response;
});


