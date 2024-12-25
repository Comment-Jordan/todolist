<?php

require_once(__DIR__ . '/../common/config.php');

class TareaModel
{
    public static function mdlGetAllTareasPendientesByUserId($usuarioId)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
            FROM tarea
            WHERE usuarioId = :usuarioId AND is_completed = 0 AND is_activo = 1"
        );

        $stmt->bindParam(":usuarioId", $usuarioId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        //$stmt->close();

        $stmt = null;
    }

    public static function mdlGetAllTareasByUserId($usuarioId)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
            FROM tarea
            WHERE usuarioId = :usuarioId AND is_activo = 1"
        );

        $stmt->bindParam(":usuarioId", $usuarioId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        //$stmt->close();

        $stmt = null;
    }

    public static function mdlGetAPapeleraByUserId($usuarioId)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
            FROM tarea
            WHERE usuarioId = :usuarioId AND is_activo = 0"
        );

        $stmt->bindParam(":usuarioId", $usuarioId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        //$stmt->close();

        $stmt = null;
    }
    
    public static function mdlUpdateCampoTarea($identificador, $campoIdentificador, $valor, $campoValor)
    {
        $sql = "UPDATE tarea SET $campoValor = :valor WHERE $campoIdentificador = :identificador";
        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt->bindParam(":identificador", $identificador, PDO::PARAM_INT);

        return $stmt->execute();

        //$stmt->close();

        $stmt = null;
    }

}
