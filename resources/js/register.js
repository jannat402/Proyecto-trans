document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formRegister");
    const btn = document.getElementById("btnSubmit");

    const fields = {
        nom: false,
        naixement: false,
        telefon: false,
        adreca: false,
        facturacio: false,
        preferencia: false,
        interes: false,
        email: false,
        password: false,
        password2: false
    };

    function validarNom() {
        const input = document.getElementById("nom");
        const error = document.getElementById("nomError");

        let value = input.value.trim();

        // Majúscula automàtica
        value = value.replace(/\b\w/g, l => l.toUpperCase());
        input.value = value;

        const regex = /^([A-Za-zÀ-ÿ]{2,})(\s[A-Za-zÀ-ÿ]{2,}){1,3}$/;

        if (!regex.test(value)) {
            error.textContent = "Introdueix entre 2 i 4 paraules sense números.";
            fields.nom = false;
        } else {
            error.textContent = "";
            fields.nom = true;
        }

        validarFormulari();
    }

    function validarNaixement() {
        const input = document.getElementById("naixement");
        const error = document.getElementById("naixementError");

        const data = new Date(input.value);
        const avui = new Date();

        const edat = avui.getFullYear() - data.getFullYear();

        if (edat < 18 || edat > 100) {
            error.textContent = "Has de tenir entre 18 i 100 anys.";
            fields.naixement = false;
        } else {
            error.textContent = "";
            fields.naixement = true;
        }

        validarFormulari();
    }

    function validarTelefon() {
        const input = document.getElementById("telefon");
        const error = document.getElementById("telefonError");

        const regex = /^\+\d{1,3}\s?\d{6,12}$/;

        if (!regex.test(input.value)) {
            error.textContent = "Format vàlid: +34 612345678";
            fields.telefon = false;
        } else {
            error.textContent = "";
            fields.telefon = true;
        }

        validarFormulari();
    }

    function validarAdreca(id, errorId) {
        const input = document.getElementById(id);
        const error = document.getElementById(errorId);

        if (input.value.length < 5) {
            error.textContent = "Adreça massa curta.";
            fields[id] = false;
        } else {
            error.textContent = "";
            fields[id] = true;
        }

        validarFormulari();
    }

    function validarEmail() {
        const input = document.getElementById("email");
        const error = document.getElementById("emailError");

        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(input.value)) {
            error.textContent = "Email no vàlid.";
            fields.email = false;
        } else {
            error.textContent = "";
            fields.email = true;
        }

        validarFormulari();
    }

    function validarPassword() {
        const input = document.getElementById("password");
        const meter = document.getElementById("passwordMeter");
        const error = document.getElementById("passwordError");

        const value = input.value;

        let força = 0;
        if (value.length >= 8) força++;
        if (/[A-Z]/.test(value)) força++;
        if (/[0-9]/.test(value)) força++;
        if (/[^A-Za-z0-9]/.test(value)) força++;

        meter.value = força;

        if (força < 2) {
            error.textContent = "Contrasenya massa feble.";
            fields.password = false;
        } else {
            error.textContent = "";
            fields.password = true;
        }

        validarFormulari();
    }

    function validarPassword2() {
        const pass1 = document.getElementById("password").value;
        const pass2 = document.getElementById("password2").value;
        const error = document.getElementById("password2Error");

        if (pass1 !== pass2) {
            error.textContent = "Les contrasenyes no coincideixen.";
            fields.password2 = false;
        } else {
            error.textContent = "";
            fields.password2 = true;
        }

        validarFormulari();
    }

    function validarFormulari() {
        const totCorrecte = Object.values(fields).every(v => v === true);

        if (totCorrecte) {
            btn.disabled = false;
            btn.classList.remove("opacity-50", "cursor-not-allowed");
        } else {
            btn.disabled = true;
            btn.classList.add("opacity-50", "cursor-not-allowed");
        }
    }

    // Checkbox facturació = enviament
    document.getElementById("mateixa").addEventListener("change", e => {
        if (e.target.checked) {
            document.getElementById("facturacio").value =
                document.getElementById("adreca").value;
            validarAdreca("facturacio", "facturacioError");
        }
    });

    // Listeners
    document.getElementById("nom").addEventListener("input", validarNom);
    document.getElementById("naixement").addEventListener("change", validarNaixement);
    document.getElementById("telefon").addEventListener("input", validarTelefon);
    document.getElementById("adreca").addEventListener("input", () => validarAdreca("adreca", "adrecaError"));
    document.getElementById("facturacio").addEventListener("input", () => validarAdreca("facturacio", "facturacioError"));
    document.getElementById("email").addEventListener("input", validarEmail);
    document.getElementById("password").addEventListener("input", validarPassword);
    document.getElementById("password2").addEventListener("input", validarPassword2);

});
