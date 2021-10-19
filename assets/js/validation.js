/* Form Validation; */

const validRegistration = () => {
    let name = document.querySelector('#name').value;
    // alert(name);
    let mail = document.querySelector('#email').value;
    let pass = document.querySelector('#pass').value;

    // Validazione del Nome;
    if (name != '') {
        let characters = name.length;
        let regEx = /^[a-zA-Z0-9]*[^%&]$/;

        if (characters > 12) {
            document.querySelector('label[for="name"]').innerHTML += '<br><div class="alert alert-info">Massimo 12 caratteri!</div>';

            return false;

        }

        if (!regEx.test(name)) {
            document.querySelector('label[for="name"]').innerHTML += '<br><div class="alert alert-warning">I caratteri speciali non sono permessi!</div>';

            return false;

        }

    }

    // Validazione della Email;
    if (mail != '') {
        let regEx = /^\S+@\S+\.\S+$/;

        if (!regEx.test(mail)) {
            document.querySelector('label[for="email"]').innerHTML += '<br><div class="alert alert-warning">Ops, l\'indirizzo mail inserito non è valido</div>';

            return false;
        }
    }

    // Validazione della Password;
    if (pass != '') {
        let regEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!regEx.test(pass)) {
            document.querySelector('label[for="pass"]').innerHTML += '<br><div class="alert alert-warning">SONO NECESSARI:<br><br> almeno 8 caratteri,<br> una lettera maiuscola,<br> un numero,<br> un carattere speciale</div>';

            return false;
        }
    }



    return true;
}