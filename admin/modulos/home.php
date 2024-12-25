<div class="main-content">
    <!-- Home page content goes here -->
    <h1>Tareas pendientes
        <button type="button" class="btn btn-primary" id="openModalBtn">Nueva Tarea</button>
    </h1>    

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
            <button type="button" id="closeModalBtn" class="btn btn-primary">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="agregarTarea()">Guardar</button>
        </div>
    </dialog>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("El DOM está listo");

        consultarTareas();

        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
                

        openModalBtn.addEventListener('click', () => {
            newTaskModal.showModal();
        });

        closeModalBtn.addEventListener('click', () => {
            newTaskModal.close();
        });
    });
</script>