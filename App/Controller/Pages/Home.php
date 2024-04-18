<?php

namespace App\Controller\Pages;

use \App\Model\Entity\Organization;
use \App\Utils\View;

Class Home extends Page{
    public static function getHome(){

        $obOrganization = new Organization;
        
        $content = View::render('pages/home',[
            'name'=> $obOrganization->name,
            'description'=> $obOrganization->description,
            'site' => $obOrganization->site
        ]);

        return parent::getPage('Home',$content);
    }
}