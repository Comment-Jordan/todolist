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
