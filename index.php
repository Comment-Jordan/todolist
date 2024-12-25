<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//NOTA: Al no mostrar errores en el navegador si llega a ocurrir un error saldra una pantalla que dice no funciona esta pagina 
ini_set("display_errors", 1); // 0 no muestra errores en el navegador, 1 si los muestra
ini_set("log_errors", 1); //Queremos crear un archivo de errores
ini_set("error_log", __DIR__ . "/error_log.txt"); //Direccion donde queremos guardar el archivo log

/* -------------------------------------------------------------------------- */
/*                                 CONTROLLERS                                */
/* -------------------------------------------------------------------------- */
require_once "brules/plantilla.controller.php";
require_once "brules/usuario.controller.php";

/* -------------------------------------------------------------------------- */
/*                                   MODELS                                   */
/* -------------------------------------------------------------------------- */
require_once "database/usuario.model.php";


// require "utils/variablesGlobales.php";

$plantilla = new PlantillaController();
$plantilla->ctrPlantilla();
?>