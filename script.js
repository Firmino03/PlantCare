function filtrar(tipo) {
  const todas = document.querySelectorAll(".planta");
  todas.forEach((planta) => {
    planta.style.display = planta.classList.contains(tipo) ? "block" : "none";
  });
}

function mostrarTodas() {
  const todas = document.querySelectorAll(".planta");
  todas.forEach((planta) => {
    planta.style.display = "block";
  });
}
