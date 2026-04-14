function verDetalle(id) {
    fetch(`/api/productos/${id}`)
        .then(r => r.json())
        .then(p => {
            document.getElementById("modalTitulo").textContent = p.nombre;
            document.getElementById("modalPrecio").textContent = p.precio + " €";
            document.getElementById("modalDescripcion").textContent = p.descripcion;
            document.getElementById("modal").classList.remove("hidden");
        });
}
