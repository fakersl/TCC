function toggleDropdownIcon(iconId) {
    const icon = document.getElementById(iconId);
    icon.classList.toggle("rotate-180"); // Adiciona/Remove a rotação de 180 graus
}

function toggleDropdown(dropdownId, arrowId) {
    const dropdown = document.getElementById(dropdownId);
    const arrow = document.getElementById(arrowId);

    // Toggle a classe para mostrar ou ocultar o dropdown
    dropdown.classList.toggle("hidden");

    // Rotaciona a seta dependendo do estado do dropdown
    arrow.classList.toggle("rotate-180");
}