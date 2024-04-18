<?php

namespace App\Http\Middleware;

use \App\Session\Login as SessionLogin;

class RequireLogout{
    public function handle($request, $next){
        if(SessionLogin::isLogged()){
            $request->getRouter()->redirect("/painel");
        }
        return $next($request);
    }
}