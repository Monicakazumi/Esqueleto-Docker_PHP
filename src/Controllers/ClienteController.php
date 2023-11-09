<?php

namespace Unialfa\Controllers;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClienteController
{
    public function getClientes(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
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
    }

    public function postCliente(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        $data = $request->getBody()->getContents();

        //validações dos dados
        //gravou no banco de dados

        //corpo de resposta
        $responseBody = [
            'message' => "Cliente cadastrado com sucesso!",
            'data' => json_decode($data)
        ];

        //finaliza getClientes() - resposta
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}