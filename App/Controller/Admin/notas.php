<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Page;
use \App\Model\Entity\Organization;
use \App\Utils\View;

Class Notas extends Page{
    public static function getNotas($request){

        $obOrganization = new Organization;
        
        $content = View::render('Admin/notas',[
            'name'=> $obOrganization->name,
            "id"=> $_SESSION['usuario']['id'] ?? '',
            "nome"=> $_SESSION['usuario']['nome']?? ''
        ]);

        return parent::getPageAdmin('Notas',$content);
    }
}