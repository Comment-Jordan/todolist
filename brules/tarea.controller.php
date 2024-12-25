<?php
require_once "../database/tarea.model.php";

class TareaController
{
    public static function ctrGetAllTareaById($usuarioId)
    {        
        $respuesta = TareaModel::mdlGetAllTareaById($usuarioId);

        return $respuesta;
    }

    public static function ctrUpdateCampoTarea($identificador, $campoIdentificador, $valor, $campoValor)
    {
        return TareaModel::mdlUpdateCampoTarea($identificador, $campoIdentificador, $valor, $campoValor);
    }

}
