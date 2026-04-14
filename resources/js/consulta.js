function validarConsulta() {
    const nombre = document.getElementById("cNombre");
    const email = document.getElementById("cEmail");
    const prod = document.getElementById("cProducto");
    const texto = document.getElementById("cTexto");
    const btn = document.getElementById("cEnviar");

    let ok = true;

    if (nombre && nombre.value.trim().length < 3) ok = false;
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) ok = false;
    if (prod.value.trim().length < 2) ok = false;
    if (texto.value.trim().length === 0) ok = false;

    btn.style.display = ok ? "block" : "none";
}

document.getElementById("consultaForm").addEventListener("submit", e => {
    e.preventDefault();
    document.getElementById("spinner").style.display = "block";

    setTimeout(() => {
        alert("Consulta enviada!");
        document.getElementById("spinner").style.display = "none";
    }, 1500);
});
