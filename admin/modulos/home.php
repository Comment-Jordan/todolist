<div class="main-content">
    <!-- Home page content goes here -->
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tareas pendientes</h1>    
         <button type="button" class="btn btn-primary" id="openModalBtn">Nueva Tarea</button>
    </div>

    <div id="cards">
        <!-- Cards go here -->
    </div>

    <dialog id="newTaskModal">
        <div class="modal-header">
            <h5 class="modal-title">Crear Nueva Tarea</h5>
        </div>
        <div class="modal-body">
            <form id="newTaskForm">
                <div class="mb-3">
                    <label for="taskTitle" class="form-label">Título</label>
                    <input id="titulo"  type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="taskDescription" class="form-label">Descripción</label>
                    <textarea id="descripcion" class="form-control" rows="3" required></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button id="closeModalBtn" type="button" class="btn btn-primary">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="agregarTarea()">Guardar</button>
        </div>
    </dialog>
</div>

<!-- Dialog -->
<dialog id="customDialog">
    <div class="modal-body">
        <strong><p>Titulo</p></strong>
        <input id="editTitulo"  type="text" class="form-control" required>

        <strong><p>Descripcion</p></strong>
        <textarea id="editDescripcion" class="form-control" rows="3" required></textarea>

        <input type="hidden" id="editIdTarea">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="cerrarDialogoEditar()">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarTarea()">Guardar cambios</button>
    </div>
</dialog>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("El DOM está listo");

        consultarTareas();

        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const guardarModalBtn = document.getElementById('guardarModalBtn');
                

        openModalBtn.addEventListener('click', () => {
            newTaskModal.showModal();
        });

        closeModalBtn.addEventListener('click', () => {
            newTaskModal.close();
        });
    });
</script>