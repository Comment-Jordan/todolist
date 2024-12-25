function tareaCardTemplate(id, title, description, isCompleted = false, isActive = true, contenedor) {
    const cardClass = isCompleted ? "bg-success text-white" : "bg-primary text-white";
    const badgeClass = isActive ? "badge bg-success" : "badge bg-danger";
    const badgeText = isActive ? "Pendiente" : "Terminada";

    const card = document.createElement("div");
    card.className = `card ${cardClass} mb-3`;
    card.style.width = "50rem";
    card.id = `tarea_${id}`;

    card.innerHTML = `
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span class="card-title">${title}</span>
                <span class="badge ${badgeClass}">${badgeText}</span>
            </div>
            </div>
            <div class="card-body">
            <div class="card-description">
                <p>${description}</p>
            </div>
            </div>
            <div class="card-footer">
            <div class="d-flex flex-column align-items-center">
                <div class="form-check">
                <input id='checkTareaActiva_${id}' type="checkbox" class="form-check-input toggle-active" ${isCompleted ? "checked" : ""}>
                <label class="form-check-label">
                    Marcar como ${isCompleted ? "Inactivo" : "Activo"}
                </label>
                </div>
                <button class="btn btn-danger btn-delete mt-3" onClick='alternarTareaActiva(${id}, 0)'>Eliminar</button>
            </div>
            </div>
        </div>
    `;


    // Add event listener for the checkbox to toggle active state
    const checkbox = card.querySelector(".toggle-active");
    const badge = card.querySelector(".badge");
    checkbox.addEventListener("change", () => {
      const active = checkbox.checked;
      badge.className = `badge ${active ? "bg-success" : "bg-danger"}`;
      badge.textContent = active ? "Pendiente" : "Terminada";
      checkbox.nextElementSibling.textContent = `Marcar como ${active ? "Inactivo" : "Activo"}`;
    });

    const contenedorCars = document.getElementById(contenedor);
    contenedorCars.appendChild(card);
    // return card;
  }
