<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--=============================
            Titulo del proyecto
        ==============================-->

        <title>Todolist</title>

        <!--Favicon-->
        <link rel="icon" href="images/plantilla/lapiz.jpg">

        <!--============================
                PLUGINS DE CSS
        =============================-->

        <!-- Enlace al CSS de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- -------------------------------------------------------------------------- -->
        <!--                               CSS DE MODULOS                               -->
        <!-- -------------------------------------------------------------------------- -->
        <link rel="stylesheet" href="css/styles.css">


        <!-- -------------------------------------------------------------------------- -->
        <!--                            PLUGINS DE JAVASCRIPT                           -->
        <!-- -------------------------------------------------------------------------- -->
        <!-- Enlace al JS de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        

    </head>

    <!--=============================
        CUERPO DEL DOCUMENTO
    ==============================-->

    <body class="hold-transition sidebar-collapse sidebar-mini <?php echo (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") ? "" : "login-page" ?>">


        <?php            
            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

                echo '<div class="wrapper">';                

                /* -------------------------------------------------------------------------- */
                /*                                 ENCABEZADO                                 */
                /* -------------------------------------------------------------------------- */

                include "modulos/encabezado.php";

                /* -------------------------------------------------------------------------- */
                /*                                    MENU                                    */
                /* -------------------------------------------------------------------------- */

                include "modulos/menu.php";

                /* -------------------------------------------------------------------------- */
                /*                                  CONTENIDO                                 */
                /* -------------------------------------------------------------------------- */

                echo '<div class="main-content">';

                    $rutas = array();                    

                    if (isset($_GET["ruta"])) {

                        $rutas = explode("/", $_GET["ruta"]);
                        
                        if (
                            $rutas[0] == "home" ||
                            $rutas[0] == "papelera" ||
                        

                            $rutas[0] == "salir"
                        ){
                            include "modulos/" . $rutas[0] . ".php";                        
                        } 
                        else {
                            include "modulos/404.php";
                        }
                    }
                    else {
                        include "modulos/home.php";
                    }

                echo '</div>';

                /* -------------------------------------------------------------------------- */
                /*                                   FOOTER                                   */
                /* -------------------------------------------------------------------------- */

                include "modulos/footer.php";
                

                echo '</div>';                
            }
            else {
                include "modulos/login.php";
            }

        ?>

        <!-- -------------------------------------------------------------------------- -->
        <!--                            JAVASCRIPT DE MODULOS                           -->
        <!-- -------------------------------------------------------------------------- -->    
        <script src="utils/fetchFunctions.js"></script>    
        <script src="js/usuarios.js"></script>
        <script src="js/tarea.js"></script>
        
        <!-- -------------------------------------------------------------------------- -->
        <!--                                COMPONENTS JS                               -->
        <!-- -------------------------------------------------------------------------- -->    
        <script src="admin/components/tarea.template.js"></script>
    </body>

</html>