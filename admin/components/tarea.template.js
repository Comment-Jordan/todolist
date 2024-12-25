function tareaCardTemplate(title, description, isCompleted = false, isActive = true, contenedor) {
    const cardClass = isCompleted ? "bg-success text-white" : "bg-primary text-white";
    const badgeClass = isActive ? "badge bg-success" : "badge bg-danger";
    const badgeText = isActive ? "Activo" : "Inactivo";

    const card = document.createElement("div");
    card.className = `card ${cardClass} mb-3`;
    card.style.maxWidth = "20rem";

    card.innerHTML = `
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>${title}</span>
        <span class="${badgeClass}">${badgeText}</span>
      </div>
      <div class="card-body">
        <p class="card-text">${description}</p>
      </div>
      <div class="card-footer text-center">
        <input type="checkbox" ${isActive ? "checked" : ""} class="form-check-input toggle-active">
        <label class="form-check-label">Marcar como ${isActive ? "Inactivo" : "Activo"}</label>
      </div>
    `;

    // Add event listener for the checkbox to toggle active state
    const checkbox = card.querySelector(".toggle-active");
    const badge = card.querySelector(".badge");
    checkbox.addEventListener("change", () => {
      const active = checkbox.checked;
      badge.className = `badge ${active ? "bg-success" : "bg-danger"}`;
      badge.textContent = active ? "Activo" : "Inactivo";
      checkbox.nextElementSibling.textContent = `Marcar como ${active ? "Inactivo" : "Activo"}`;
    });

    const contenedorCars = document.getElementById(contenedor);
    contenedorCars.appendChild(card);
    // return card;
  }
