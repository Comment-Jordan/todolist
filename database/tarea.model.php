<?php

require_once(__DIR__ . '/../common/config.php');

class TareaModel
{
    public static function mdlGetAllTareaById($usuarioId)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
            FROM tarea
            WHERE usuarioId = :usuarioId"
        );

        $stmt->bindParam(":usuarioId", $usuarioId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        //$stmt->close();

        $stmt = null;
    }
    
}
