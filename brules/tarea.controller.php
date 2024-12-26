<?php
require_once "../database/tarea.model.php";

class TareaController
{
    public static function ctrGetAllTareasPendientesByUserId($usuarioId)
    {        
        $respuesta = TareaModel::mdlGetAllTareasPendientesByUserId($usuarioId);

        return $respuesta;
    }

    public static function ctrGetAllTareasByUserId($usuarioId)
    {        
        $respuesta = TareaModel::mdlGetAllTareasByUserId($usuarioId);

        return $respuesta;
    }

    public static function ctrGetPapeleraByUserId($usuarioId)
    {        
        $respuesta = TareaModel::mdlGetAPapeleraByUserId($usuarioId);

        return $respuesta;
    }

    public static function ctrUpdateCampoTarea($identificador, $campoIdentificador, $valor, $campoValor)
    {
        return TareaModel::mdlUpdateCampoTarea($identificador, $campoIdentificador, $valor, $campoValor);
    }

    public static function ctrAddTarea($titulo, $descripcion, $usuarioId)
    {
        return TareaModel::mdlAddTarea($titulo, $descripcion, $usuarioId);
    }

    public static function ctrGetTareaById($id)
    {
        return TareaModel::mdlGetTareaById($id);
    }

    public static function ctrDeleteTarea($id)
    {
        return TareaModel::mdlDeleteTarea($id);
    }

    public static function ctrUpdateTarea($id, $titulo, $descripcion)
    {
        return TareaModel::mdlUpdateTarea($id, $titulo, $descripcion);
    }
}
