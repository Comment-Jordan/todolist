async function consultarTareas() {
    let tareas = await getFetchData(
        "ajaxcall/tarea.ajax.php?funct=getTareasPendientesByUserId",
        [], 
    );

    if (tareas.success) {
        tareas.data.forEach( tarea => {
            tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards");        
        });
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
            tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards");        
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
            tareaCardTemplate(tarea.id_tarea, tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards");        
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
        valor: isActive,
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
            text: "Tarea movida a la papelera",
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
        tareaCardTemplate(tarea.data.id_tarea, tarea.data.titulo, tarea.data.descripcion, tarea.data.is_completed, tarea.data.is_activo, "cards");
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
        alert(tarea.msg);
    }
}