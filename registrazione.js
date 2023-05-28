function jsonControlloUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errori');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errori');
    }

}

function jsonControlloEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errori');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errori');
    }

}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function ControlloUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore, per un massimo di 15 caratteri!";
        input.parentNode.classList.add('errori');
        formStatus.username = false;

    } else {
        fetch("controllo_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonControlloUsername);
    }    
}

function ControlloEmail(event) {
    const emailInput = document.querySelector('.email input');
//toLowerCase semplicemente mi converte l'intera stringa in caratteri minuscoli, ma non modifica assolutamente quest'ultima
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errori');
        formStatus.email = false;

    } else {
        fetch("controllo_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonControlloEmail);
    }
}

function ControlloPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errori');
    } else {
        document.querySelector('.password').classList.add('errori');
    }

}

function ControlloConfermaPassword(event) {
    const confirmPasswordInput = document.querySelector('.conferma_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.conferma_password').classList.remove('errori');
    } else {
        document.querySelector('.conferma_password').classList.add('errori');
    }
}


document.querySelector('.username input').addEventListener('blur', ControlloUsername);
document.querySelector('.email input').addEventListener('blur', ControlloEmail);
document.querySelector('.password input').addEventListener('blur', ControlloPassword);
document.querySelector('.conferma_password input').addEventListener('blur', ControlloConfermaPassword);