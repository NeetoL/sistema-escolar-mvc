<?php

require __DIR__."/../vendor/autoload.php";


use \App\Utils\View;
use WilliamCosta\DatabaseManager\Database;
use \WilliamCosta\DotEnv\Environment;
use \App\Http\Middleware\Queue as MiddlewareQueue;

Environment::load(__DIR__.'/../');

Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT')
);

define("URL", getenv("URL"));

View::init([
    "URL"=> URL
]);

MiddlewareQueue::setMap([
    'maintenance' => \App\Http\Middleware\Maintenance::class,
    'required-logout' => \App\Http\Middleware\RequireLogout::class,
    'required-login' => \App\Http\Middleware\RequireLogin::class
]);

MiddlewareQueue::setDefault([
    'maintenance'
]);