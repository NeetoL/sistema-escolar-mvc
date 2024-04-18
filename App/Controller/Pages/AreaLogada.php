<?php

namespace App\Controller\Pages;

use \App\Model\Entity\Organization;
use \App\Utils\View;

Class AreaLogada extends Page{
    public static function getLogin(){

        $obOrganization = new Organization;
        
        $content = View::render('pages/painel',[
            'name'=> $obOrganization->name
        ]);

        return parent::getPage('Area Logada',$content);
    }
}