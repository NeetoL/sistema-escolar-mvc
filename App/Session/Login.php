<?php 

namespace App\Session;
class Login{
    private static function init(){

        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

    }
    public static function login($obUser){
        self::init();

        $_SESSION['usuario'] = [
            'id' => $obUser->id_aluno,
            'nome' => $obUser->nome,
            'email' => $obUser->email
        ];

        return true;
    }

    public static function isLogged(){
        self::init();

        return isset($_SESSION['usuario']['id']);

    }

    public static function logout(){
        self::init();
        unset($_SESSION['usuario']);
        return true;
    }
}