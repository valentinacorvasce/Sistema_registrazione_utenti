/* Form Validation; */

const validRegistration = () => {
    let name = document.querySelector('#name').value;
    // alert(name);

    if (name != '') {
        let characters = name.length;

        if (characters > 12) {
            document.querySelector('label[for="name"]').innerHTML += '<br><div class="alert alert-info">Massimo 12 caratteri!</div>';

            return false;

        }

    }



    return true;
}