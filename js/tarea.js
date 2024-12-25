async function consultarTareas() {
    let tareas = await getFetchData(
        "ajaxcall/tarea.ajax.php?funct=getTareasByUserId",
        [], 
    );

    if (tareas.success) {
        tareas.data.forEach( tarea => {
            tareaCardTemplate(tarea.titulo, tarea.descripcion, tarea.is_completed, tarea.is_activo, "cards");        
        });
    }
    else {
        alert(tareas.msg);
    }
}