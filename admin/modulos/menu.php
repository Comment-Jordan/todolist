<div class="sidebar">
    <a id="home" href="home">Tareas pendientes</a>
    <a id="todasTareas" href="todasTareas">Todas las tareas</a>
    <a id="papelera" href="papelera">Papelera</a>
    <a id="salir" href="salir">Cerrar sesi&oacute;n</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const pagina = window.location.pathname.split("/").pop();        

        switch (pagina) {
            case 'home':
                document.getElementById('home').classList.add('active');
                break;
            case 'todasTareas':
                document.getElementById('todasTareas').classList.add('active');
                break;
            case 'papelera':
                document.getElementById('papelera').classList.add('active');
                break;
            case 'salir':
                document.getElementById('salir').classList.add('active');
                break;
            default:
                break;
        }
    });
</script>
