<?php 

namespace App\Controller\Admin;

use \App\Utils\View;

class Page{
    public static function getPage($title,$content){
        return View::render('admin/page',[
            'title' => $title,
            'content'=> $content
        ]);
    }
    
    public static function getMenu(){
        return View::render("admin/menu",[
            "id"=> $_SESSION['usuario']['id'] ?? '',
            "nome"=> $_SESSION['usuario']['nome']?? ''
        ]);
    }
    public static function getPageAdmin($title, $content){
        return View::render('admin/painel',[
            'title'=> $title,
            'menu' => self::getMenu(),
            'footer' => self::getFooter(),
            'content'=> $content
        ]);
    }
    public static function getFooter(){
        return View::render('admin/footer');
    }
}