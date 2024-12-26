function tareaCardTemplate(id, title, description, isCompleted = false, isActive = true, contenedor, fechaCreacion="", fechaActualizacion="") { 
    const cardClass = isCompleted == true ? "bg-success text-white" : "bg-primary text-white";
    const badgeText = isCompleted == true ? "Terminada" : "Pendiente";
    const badgeClass = isCompleted  == true ? "badge bg-success" : "badge bg-danger";

    const card = document.createElement("div");
    card.className = `card ${cardClass} mb-3`;
    card.style.width = "50rem";
    card.id = `tarea_${id}`;

    card.innerHTML = `
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p id='idTituloTarea_${id}'>${title}</p>
                <small>Creacion: ${fechaCreacion}</small>
                <small id='idFechaActualizacionTarea_${id}'>Actualizacion: ${fechaActualizacion}</small>
                <span class="badge ${badgeClass}">${badgeText}</span>
            </div>
            </div>
            <div class="card-body">
            <div class="card-description">
                <p id='idDescripcionTarea_${id}'>${description}</p>
            </div>
            </div>
            <div class="card-footer">
            <div class="d-flex flex-column align-items-center">
                <div class="form-check">
                <input id='checkTareaActiva_${id}' type="checkbox" class="form-check-input toggle-active" ${isCompleted == true ? "checked" : ""}>
                <label class="form-check-label">
                    Tarea finalizada
                </label>
                </div>
                <div class="d-flex justify-content-between gap-3">
                <button class="btn btn-danger btn-delete mt-3" onClick='eliminarTarea(${id})'>Eliminar</button>
                    <button class="btn btn-warning btn-delete mt-3" onClick='alternarTareaActiva(${id}, ${isActive})'>${isActive == true ? 'Mover a la papelera' : 'Restaurar'}</button>
                    <button class="btn btn-success btn-delete mt-3" onClick='abrirDialogoEditar(${id})'>Editar</button>
                </div>
            </div>
            </div>
        </div>
    `;


    // Add event listener for the checkbox to toggle active state
    const checkbox = card.querySelector(".toggle-active");
    const badge = card.querySelector(".badge");
    checkbox.addEventListener("change", async () => {
      const active = checkbox.checked;
      badge.className = `badge ${active == true ? "bg-success" : "bg-danger"}`;
      badge.textContent = active ? "Terminada" : "Pendiente";
      //   checkbox.nextElementSibling.textContent = `Marcar como ${active ? "Inactivo" : "Activo"}`;

      const checkValorIsCompleted = $(`#checkTareaActiva_${id}`).is(':checked')

      let datosUpdate = {
        identificador: id,
        campoIdentificador: "id_tarea",
        valor: checkValorIsCompleted,
        campoValor: "is_completed"
      };

      let updateIsCompleted = await putFetchData("ajaxcall/tarea.ajax.php?funct=updateCampoTarea",
        [], datosUpdate
      );

      if (updateIsCompleted.success) {
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
      else {
        Toastify({
            text: "Error al completar la tarea",
            duration: 3000,
            gravity: "top", // Posición: "top" o "bottom"
            position: "right", // Posición: "left", "center" o "right"
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc3a0)", // Gradiente de color
            stopOnFocus: true, // Detiene la animación cuando se pasa el mouse sobre la notificación
            close: true, // Mostrar botón de cierre
        }).showToast();
      }

    });

    const contenedorCars = document.getElementById(contenedor);
    contenedorCars.appendChild(card);
    // return card;
  }
