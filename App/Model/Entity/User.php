<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class User{
    public $id;
    public $name;
    public $matricula;
    public $password;

    public static function getMatricula($matricula){
        return (new Database('alunos'))->select('matricula ="'.$matricula.'"')->fetchObject(self::class);
    }
}