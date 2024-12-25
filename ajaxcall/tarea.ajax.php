<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../brules/tarea.controller.php';
require_once __DIR__ . '/../database/tarea.model.php';

$ajaxTarea = new AjaxTarea();

switch ($_GET["funct"]) {
    case 'getTareasByUserId':
        $ajaxTarea->getTareasByUserId();
    break;

    default:
        echo "Ajax call not found";
    break;
}

class AjaxTarea
{
    public static function getTareasByUserId(){
        if(isset($_SESSION["usuario"])){
            $tarea = new TareaController();
            $consultaTareas = $tarea->ctrGetAllTareaById($_SESSION["id"]);
            
            $respuesta = array(
                "success" => true,
                "msg" => "Tareas consultadas",
                "data" => $consultaTareas
            );            
        }
        else{
            $respuesta = array(
                "success" => false,
                "msg" => "No se ha iniciado sesión"
            );
        }

        echo json_encode($respuesta);
    }
}