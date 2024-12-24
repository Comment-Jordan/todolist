<?php

// Renombrar el archivo config.example.php a config.php

class Conexion{

    public static function conectar(){

        $link = new PDO(
            "mysql:host=localhost;
            dbname=todolist", 
            "root",
            ""
        );

        //Lo que venga con caracteres latinos los podamos usar sin problema 
        $link->exec("set names utf8");

        return $link;
    }

}