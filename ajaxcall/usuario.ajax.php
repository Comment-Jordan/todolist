<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../brules/usuario.controller.php';
require_once __DIR__ . '/../database/usuario.model.php';

$ajaxUsuarios = new AjaxUsuarios();

switch ($_GET["funct"]) {
    case 'iniciarSesion':
        $ajaxUsuarios->iniciarSesion();
    break;

    default:
        echo "Ajax call not found";
    break;
}

class AjaxUsuarios
{
    public static function iniciarSesion(){
        if (isset($_POST["usuario"]) && isset($_POST["password"])) {            
            //Evitamos caracteres especiales para evitar sql injection
            //    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usr_email"]) ){}                       
            
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            
            $consultaLogin = UsuariosController::ctrIniciarSesion($usuario , $password);

            if($consultaLogin==false){
                $respuesta = array(
                    "success" => false,
                    "msg" => "Usuario o contraseña incorrectos"
                );
                echo json_encode($respuesta);
                return;
            }

            if ($consultaLogin["usuario"] == $usuario && $consultaLogin["password"] == $password ) {

                if ($consultaLogin["activo"] == 1) {

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $consultaLogin["id"];
                    $_SESSION["usuario"] = $consultaLogin["usuario"];
                                                                                
                    //=============================================
                    //     REGISTRO DE FECHA DE ULTIMO LOGIN
                    //=============================================
                    date_default_timezone_set('America/Mexico_City');

                    $respuesta = array(
                        "success" => true,
                        "msg" => "ok"
                    );
                    
                }
                else{
                    $respuesta = array(
                        "success" => false,
                        "msg" => "Usuario inactivo"
                    );
                }
            }
            else{
                $respuesta = array(
                    "success" => false,
                    "msg" => "Usuario o contraseña incorrectos"
                );
            }           
        }
        else{
            $respuesta = array(
                "success" => false,
                "msg" => "Datos imcompletos"
            );
        }

        echo json_encode($respuesta);
    }
}