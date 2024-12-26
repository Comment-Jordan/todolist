async function consultarTareas() {
    let tareas = await getFetchData(
        "ajaxcall/tarea.ajax.php?funct=getTareasPendientesByUserId",
        [], 
    );

    if (tareas.success) {
        if(tareas.data.length > 0){
            tareas.data.forEach( tarea => {
                tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards", tarea.fecha_creacion, tarea.fecha_actualizacion);        
            });
        }
        // else {
        //     document.getElementById("cards").innerHTML = `
        //         <h3 id="sinTareasPendientes" class="text-center mt-5" style="font-family: 'Arial', sans-serif; font-weight: bold; color: #ffcc00; 
        //         background-color: #343a40; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        //         <i class="fas fa-search"></i> <span style="font-style: italic;">Nada por aquí...</span> <i class="fas fa-eye-slash"></i><br>
        //         Parece que todo está en orden, ¡pero no te relajes mucho! 👀
        //         </h3>
        //     `;
        // }
    }
    else {
        alert(tareas.msg);
    }
}
async function consultarTodasTareas() {
    let tareas = await getFetchData(
        "ajaxcall/tarea.ajax.php?funct=getAllTareasByUserId",
        [], 
    );

    if (tareas.success) {
        tareas.data.forEach( tarea => {
            tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards", tarea.fecha_creacion, tarea.fecha_actualizacion);        
        });
    }
    else {
        alert(tareas.msg);
    }
}

async function consultarPapelera(params) {
    let tareas = await getFetchData(
        "ajaxcall/tarea.ajax.php?funct=getPapeleraByUserId",
        [], 
    );
    
    if (tareas.success) {
        tareas.data.forEach( tarea => {
            tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards", tarea.fecha_creacion, tarea.fecha_actualizacion);        
        });
    }
    else {
        alert(tareas.msg);
    }
}

async function alternarTareaActiva(id, isActive) {

    // const isActive = $(`checkTareaActiva_${id}`).is(':checked')

    let datosUpdate = {
        identificador: id,
        campoIdentificador: "id_tarea",
        valor: !isActive,
        campoValor: "is_activo"
    };

    let update = await putFetchData("ajaxcall/tarea.ajax.php?funct=updateCampoTarea",
        [], datosUpdate
    );
    
    if (update.success) {        
        let card = document.getElementById(`tarea_${id}`);
        card.classList.add('hide'); // Añade la clase para animar        
        setTimeout(() => {
          card.remove();
        }, 500);

        Toastify({
            text: "Tarea actualizada",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();
    }
    else
    {
        Toastify({
            text: "Hubo un error al mover la tarea a la papelera",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc3a0)", // Gradiente de color
            stopOnFocus: true,
            close: true,
        }).showToast();
    }

}

async function agregarTarea(){

    let datosTarea = new FormData();
    datosTarea.append("titulo", $("#titulo").val());
    datosTarea.append("descripcion", $("#descripcion").val());

    let tarea = await postFetchData("ajaxcall/tarea.ajax.php?funct=postAgregarTarea",
        [], datosTarea
    );

    if (tarea.success) {
        tareaCardTemplate(tarea.data.id_tarea, tarea.data.titulo, tarea.data.descripcion, tarea.data.is_completed, tarea.data.is_activo, "cards", tarea.data.fecha_creacion, tarea.data.fecha_actualizacion);
        Toastify({
            text: "Tarea agregada",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();        
    }
    else {
        Toastify({
            text: "Tarea agregada",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc3a0)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();
    }

    const newTaskModal = document.getElementById('newTaskModal');
    newTaskModal.close();
}

async function eliminarTarea(id){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta acción.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar',
        cancelButtonText: 'Cancelar'
    }).then(async (result) => {
        if (result.isConfirmed) {
            let datosTarea = { id_tarea: id }; // Use an object instead of FormData

            // Acción cuando el usuario confirma
            let tarea = await deleteFetchData("ajaxcall/tarea.ajax.php?funct=deleteTarea",
                { 'Content-Type': 'application/json' }, datosTarea // Set headers for JSON
            );
        
            if (tarea.success) {
                let card = document.getElementById(`tarea_${id}`);
                card.classList.add('hide'); // Añade la clase para animar        
                setTimeout(() => {
                  card.remove();
                }, 500);
        
                Toastify({
                    text: "Tarea eliminada",
                    duration: 3000,
                    gravity: "top", // Posición: "top" o "bottom"
                    position: "right", // Posición: "left", "center" o "right"
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Gradiente de color
                    stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
                    close: true, // Mostrar botón de cierre
                }).showToast();
            }
            else{
                Toastify({
                    text: "Hubo un error al borrar la tarea.",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc3a0)", // Gradiente de color
                    stopOnFocus: true,
                    close: true,
                }).showToast();                
            }
        }
    });
}

async function editarTarea(){
    let datosTarea = { 
        id_tarea: $("#editIdTarea").val(),
        titulo: $("#editTitulo").val(),
        descripcion: $("#editDescripcion").val()
    };        

    let tarea = await putFetchData("ajaxcall/tarea.ajax.php?funct=updateTarea", 
        [], datosTarea
    );
    
    if (tarea.success) {        
        cerrarDialogoEditar();
        Toastify({
            text: "Tarea actualizada",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();

        $("#idTituloTarea_" + datosTarea.id_tarea).text(datosTarea.titulo);
        $("#idDescripcionTarea_" + datosTarea.id_tarea).text(datosTarea.descripcion);
        $("#idFechaActualizacionTarea_" + datosTarea.id_tarea).text(`Actualizacion${tarea.data.fecha_actualizacion}`);
    }
    else {
        Toastify({
            text: "Error al actualizar la tarea",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc3a0)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();
    }
}

function abrirDialogoEditar(id){    
    const dialog = document.getElementById('customDialog');
    $("#editIdTarea").val(id);
    dialog.showModal();
}

function cerrarDialogoEditar(){
    const dialog = document.getElementById('customDialog');
    dialog.close();
}

