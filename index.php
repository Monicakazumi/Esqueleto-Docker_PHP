<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require_once "vendor/autoload.php";

$app = AppFactory::create();

$app->get('/clientes', function(ServerRequestInterface $request, ResponseInterface $response, $args){
    //print_r("AAAAAAAAAAAAAOOOOOOOOOOO");
    //essa fase pose ser buscada do banco de dados
    $clientes = [
        ['id' => 1, 'nome' => 'Midras 1'],
        ['id' => 2, 'nome' => 'Cliente 2'],
        ['id' => 3, 'nome' => 'Cliente 3']
    ];

    //esses métodos estão vindo do ResponseInterface - write; withHeader
    $response->getBody()->write(json_encode($clientes));
    return $response->withHeader('Content-type', 'application/json');

});

$app->run();