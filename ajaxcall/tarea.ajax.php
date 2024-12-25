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

    case 'updateCampoTarea':
        $ajaxTarea->updateCampoTarea();
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

    public static function updateCampoTarea(){
        if(isset($_GET["identificador"]) && isset($_GET["campoIdentificador"]) && isset($_GET["valor"]) && isset($_GET["campoValor"])){
            $tarea = new TareaController();
            $updateCampo = $tarea->ctrUpdateCampoTarea($_GET["identificador"], $_GET["campoIdentificador"], $_GET["valor"], $_GET["campoValor"]);
            
            if($updateCampo==true){
                $respuesta = array(
                    "success" => true,
                    "msg" => "Update realizado"
                );            
            }
            else{
                $respuesta = array(
                    "success" => false,
                    "msg" => "Error en el update"
                );
            }
            
        }
        else{
            $respuesta = array(
                "success" => false,
                "msg" => "Faltan datos"
            );
        }

        echo json_encode($respuesta);
    }
}