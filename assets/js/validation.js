/* Form Validation; */

const validRegistration = () => {
    let name = document.querySelector('#name').value;
    // alert(name);
    let mail = document.querySelector('#email').value;

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
    if () {

    }



    return true;
}