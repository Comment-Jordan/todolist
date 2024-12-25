<?php

class TareaController
{
    public static function ctrGetAllTareaById($usuarioId)
    {        
        $respuesta = TareaModel::mdlGetAllTareaById($usuarioId);

        return $respuesta;
    }

}
