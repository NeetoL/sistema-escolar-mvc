<?php 

namespace App\Controller\Admin;

use \App\Utils\View;
use \App\Model\Entity\User;
use \App\Session\Login as SessionLogin;

class Login extends Page{
    public static function getLogin($request,$errorMessage = null){
        $status = !is_null($errorMessage) ?View::render("admin/login/status",[
            "mensagem"=> $errorMessage,
         ]) : '';
        $content = View::render("admin/login",[
            'status' => $status
        ]);
        return parent::getPage('LN - Login',$content);
    }
    public static function getAdmin($request){        
        $content = View::render("admin/home",[]);        
        return parent::getPageAdmin('Admin',$content);
    }

    public static function setLogin($request){
        $postVars   = $request->getPostVars();
        $matricula  = $postVars["matricula"] ?? '';
        $pass       = $postVars['senha'] ?? '';
        $nome       = $postVars['nome'] ?? '';

        $obUser = User::getMatricula($matricula);
        $senha = $obUser->senha;
        if(!$obUser instanceof User){
            return self::getLogin($request, 'Matrícula ou Senha invalidos!');
        }

        if(!password_verify($pass, $senha)){            
            return self::getLogin($request,'Senha inválida');
        }

        SessionLogin::Login($obUser);
        $request->getRouter()->redirect('/painel');
    }

    public static function setLogout($request){
        SessionLogin::Logout();
        $request->getRouter()->redirect('/login');
    }
}