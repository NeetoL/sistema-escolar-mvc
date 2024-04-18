<?php

namespace App\Controller\Pages;

use \App\Model\Entity\Organization;
use \App\Utils\View;

Class About extends Page{
    public static function getAbout(){

        $obOrganization = new Organization;
        
        $content = View::render('pages/about',[
            'name'=> $obOrganization->name
        ]);

        return parent::getPage('Sobre',$content);
    }
}