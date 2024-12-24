<?php

class UsuariosController
{
    public static function ctrIniciarSesion($usuario, $password)
    {        
        $respuesta = UsuariosModel::mdlMostrarUsuarios($usuario, $password);

        return $respuesta;
    }

}
