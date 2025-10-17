const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// VALIDANDO FORMULARIO
const form = document.getElementById('form');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let is_valid = false; 

    // inputs
    const user_name = document.getElementById('name');
    const user_email = document.getElementById('email');
    const user_password = document.getElementById('password');


    // validação nome
    if (!user_name.value || user_name.value.length < 2) {
        user_name.classList.add("is-invalid");
    } else {
        user_name.classList.remove("is-invalid");
        is_valid = true;
    }

    // validação email
    if (!user_email.value || !emailRegex.test(user_email.value)) {
        user_email.classList.add("is-invalid");
    } else {
        user_email.classList.remove("is-invalid");
        is_valid = true;
    }

    // validação senha
    if (!user_password.value || user_password < 6) {
        user_password.classList.add("is-invalid");
    } else {
        user_password.classList.remove("is-invalid");
        is_valid = true;
    }

    // Envia formulario
    if (is_valid) {
        alert("Formalario valido! Enviando..")
        form.submit();
    }
})