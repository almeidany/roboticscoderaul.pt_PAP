document.addEventListener("DOMContentLoaded", function () {
    // Permitir apenas letras e "ç" nos nomes
    function validarNomeInput(event) {
        const regex = /^[a-zA-ZçÇ\s]*$/;
        if (!regex.test(event.key)) {
            event.preventDefault();
        }
    }

    // Permitir apenas números e limitar a 6 dígitos
    function validarNumeroAluno(event) {
        const input = event.target;
        if (input.value.length >= 6 && !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'].includes(event.key)) {
            event.preventDefault();
        }
        if (!/^\d$/.test(event.key)) {
            event.preventDefault();
        }
    }

    // Permitir apenas números e limitar a 9 dígitos
    function validarTelefone(event) {
        const input = event.target;
        if (input.value.length >= 9 && !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'].includes(event.key)) {
            event.preventDefault();
        }
        if (!/^\d$/.test(event.key)) {
            event.preventDefault();
        }
    }

    // Aplicar as validações
    const primeiroNome = document.getElementById("first_name");
    const ultimoNome = document.getElementById("last_name");
    const numeroAluno = document.getElementById("schoolnumber");
    const telefone = document.getElementById("phonenumber");

    if (primeiroNome) {
        primeiroNome.addEventListener("keypress", validarNomeInput);
    }

    if (ultimoNome) {
        ultimoNome.addEventListener("keypress", validarNomeInput);
    }

    if (numeroAluno) {
        numeroAluno.addEventListener("keypress", validarNumeroAluno);
    }

    if (telefone) {
        telefone.addEventListener("keypress", validarTelefone);
    }
});