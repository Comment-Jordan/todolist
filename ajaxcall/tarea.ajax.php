<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../brules/tarea.controller.php';
require_once __DIR__ . '/../database/tarea.model.php';

$ajaxTarea = new AjaxTarea();

switch ($_GET["funct"]) {
    case 'getTareasPendientesByUserId':
        $ajaxTarea->getTareasPendientesByUserId();
    break;

    case 'updateCampoTarea':
        $ajaxTarea->updateCampoTarea();
    break;

    case 'getPapeleraByUserId':
        $ajaxTarea->getPapeleraByUserId();
    break;

    case 'getAllTareasByUserId':
        $ajaxTarea->getAllTareasByUserId();
    break;

    case 'postAgregarTarea':
        $ajaxTarea->postAgregarTarea();
    break;

    case 'deleteTarea':
        $ajaxTarea->deleteTarea();
    break;

    case 'updateTarea':
        $ajaxTarea->updateTarea();
    break;

    default:
        echo "Ajax call not found";
    break;
}

class AjaxTarea
{
    public static function getTareasPendientesByUserId(){
        if(isset($_SESSION["usuario"])){
            $tarea = new TareaController();
            $consultaTareas = $tarea->ctrGetAllTareasPendientesByUserId($_SESSION["id"]);
            
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

    public static function getAllTareasByUserId(){
        if(isset($_SESSION["usuario"])){
            $tarea = new TareaController();
            $consultaTareas = $tarea->ctrGetAllTareasByUserId($_SESSION["id"]);
            
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

    public static function getPapeleraByUserId(){
        if(isset($_SESSION["usuario"])){
            $tarea = new TareaController();
            $consultaTareas = $tarea->ctrGetPapeleraByUserId($_SESSION["id"]);
            
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

    public static function postAgregarTarea(){
        if(isset($_POST["titulo"]) && isset($_POST["descripcion"])){
            $tarea = new TareaController();
            $agregarTarea = $tarea->ctrAddTarea($_POST["titulo"], $_POST["descripcion"], $_SESSION["id"]);
            
            if($agregarTarea>0){
                $consultaTarea = $tarea->ctrGetTareaById($agregarTarea);
                $respuesta = array(
                    "success" => true,
                    "msg" => "Tarea agregada",
                    "data" => $consultaTarea
                );            
            }
            else{
                $respuesta = array(
                    "success" => false,
                    "msg" => "Error al agregar tarea"
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

    public static function deleteTarea(){        
        $input = json_decode(file_get_contents('php://input'), true); // Decode JSON input
        if(isset($input["id_tarea"])){
            $tarea = new TareaController();
            $deleteTarea = $tarea->ctrDeleteTarea($input["id_tarea"]);
            
            if($deleteTarea==true){
                $respuesta = array(
                    "success" => true,
                    "msg" => "Tarea eliminada"
                );            
            }
            else{
                $respuesta = array(
                    "success" => false,
                    "msg" => "Error al eliminar tarea"
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

    public static function updateTarea(){        
        if(isset($_GET["id_tarea"]) && isset($_GET["titulo"]) && isset($_GET["descripcion"])){
            $tarea = new TareaController();
            $updateTarea = $tarea->ctrUpdateTarea($_GET["id_tarea"], $_GET["titulo"], $_GET["descripcion"]);
            
            if($updateTarea == true){
                $consultaTarea = $tarea->ctrGetTareaById($_GET["id_tarea"]);
                $respuesta = array(
                    "success" => true,
                    "msg" => "Tarea actualizada",
                    "data" => $consultaTarea
                );            
            }
            else{
                $respuesta = array(
                    "success" => false,
                    "msg" => "Error al actualizar tarea"
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