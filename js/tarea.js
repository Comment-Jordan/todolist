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
        alert(update.msg);
        let card = document.getElementById(`tarea_${id}`);
        card.remove();
    }
    else
    {
        alert(update.msg);
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
        // tareaCardTemplate(tarea.data.id_tarea, tarea.data.titulo, tarea.data.descripcion, tarea.data.is_completed, tarea.data.is_activo, "cards");
        alert("Tarea agregada correctamente");
    }
    else {
        alert(tarea.msg);
    }
}