<?php

require_once(__DIR__ . '/../common/config.php');

class UsuariosModel
{
    public static function mdlMostrarUsuarios($usuario, $password)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
            FROM usuario
            WHERE usuario = :usuario AND password = :password"
        );

        

        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        //$stmt->close();

        $stmt = null;
    }
}
