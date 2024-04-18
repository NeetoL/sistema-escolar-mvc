<?php

use \App\Http\Response;
Use \App\Controller\Admin;

$obRouter->get("/painel",[
    'middlewares' => [
        'required-login'
    ],
    function($request) {
        return new Response(200,Admin\Login::getAdmin($request));
    }
]);

$obRouter->get("/painel/notas",[ 
    'middlewares' => [
        'required-login'
    ],
    function($request) {
        return new Response(200,Admin\Notas::getNotas($request));
    }
]);

$obRouter->get("/login",[
    'middlewares' => [
        'required-logout'
    ],
    function($request) {
        return new Response(200,Admin\Login::getLogin($request));
    }
]);

$obRouter->post("/login",[    
    'middlewares' => [
        'required-logout'
    ], 
    function($request) {
        return new Response(200,Admin\Login::setLogin($request));
    }
]);

$obRouter->get("/logout",[    
    'middlewares' => [
        'required-login'
    ],
    function($request) {
        return new Response(200,Admin\Login::setLogout($request));
    }
]);
