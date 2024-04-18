<?php

namespace App\Controller\Admin;

use \App\Model\Entity\User;
use App\Controller\Admin\Page;
use \App\Model\Entity\Organization;
use \App\Utils\View;

Class Notas extends Page{
    public static function getNotas($request){

        $resultado = User::getnotas($_SESSION['usuario']['id']);

        $jsonResultado = json_encode($resultado);

        $obOrganization = new Organization;
        
        $content = View::render('Admin/notas',[
            'name'=> $obOrganization->name,
            "id"=> $_SESSION['usuario']['id'] ?? '',
            "nome"=> $_SESSION['usuario']['nome']?? '',
            "notas" => $jsonResultado
        ]);

        return parent::getPageAdmin('Notas',$content);
    }
}