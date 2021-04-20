<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use PlugHttp\Response;
use Firebase\JWT\JWT;

// ENVIROMENT VARS

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// ELOQUENT

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => $_ENV['DB_DRIVER'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'port'      => $_ENV['DB_PORT'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => $_ENV['DB_CHARSET'],
    'collation' => $_ENV['DB_COLLATION'],
    'prefix'    => $_ENV['DB_PREFIX'],
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = \PlugRoute\RouteFactory::create();

$route->loadFromJson(__DIR__ . '/src/Infra/route.json');

$myDependencies = [
    'App\Domain\AditamentoPlano\Protocol\PropostaRepositoryInterface' => new \App\Infra\Eloquent\PropostaRepository,
];

$route->notFound(function () {
    echo 'not found';
});

$route->on($myDependencies);