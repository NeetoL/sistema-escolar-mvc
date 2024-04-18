<?php

namespace App\Controller\Pages;

use \App\Utils\View;
Class Page{
    public static function getHeader(){
        return View::render("pages/header");
    }
    public static function getPage($title, $content){
        return View::render('pages/page',[
            'title'=> $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'content'=> $content
        ]);
    }
    public static function getFooter(){
        return View::render('pages/footer');
    }
}