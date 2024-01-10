/* Global Variable Used */
const form = document.querySelector('form');



// Validate Email 
function validateEmail() {

    const EmailValue = emailInput.value;
    const EmailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    switch (true) {
        case !EmailValue:
            errorMessage[0].innerText = "Email Should Not Be Empty";
            return false;
        case !EmailRegex.test(EmailValue):
            errorMessage[0].innerText = "Invalid Email";
            return false;
        default:
            errorMessage[0].innerText = "";
            return true;
    }
}

// Validate Password
function validatePassword() {

    const PasswordValue = passwordInput.value;
    const PasswordRegex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])/;

    switch (true) {
        case !PasswordValue:
            errorMessage[1].innerText = "Password Should Not Be Empty";
            return false;
        case PasswordValue.length < 8:
                errorMessage[1].innerText = "Password Should Contain Atleast 8 Chr";
                return false;
        case PasswordValue.length > 25:
                errorMessage[1].innerText = "Password Should Not Contain More Than 25 Chr";
                return false;
        case !PasswordRegex.test(PasswordValue):
            errorMessage[1].innerText = "Password Should Atleast Contain 1 Special Character";
            return false;
        default:
            errorMessage[1].innerText = "";
            return true;
    }
}

// Validate First Name 
function validateFirstName() {

    const errorMessage = document.querySelector('.firstNameInput');
    const NameRegex = /^[A-Za-z\s]+$/;

    switch (true) {
        case !firstNameInput.value:
            errorMessage.innerText = "First Name Should Not Be Empty";
            return false;
        case !NameRegex.test(firstNameInput.value):
            errorMessage.innerText = "First Name Not Valid";
            return false;
        default:
            errorMessage.innerText = "";
            return true;
    }
}

// Validate Last Name 
function validateLastName() {

    const errorMessage = document.querySelector('.lastNameInput');
    const NameRegex = /^[A-Za-z\s]+$/;

    switch (true) {
        case !lastNameInput.value:
            errorMessage.innerText = "Last Name Should Not Be Empty";
            return false;
        case !NameRegex.test(lastNameInput.value):
            errorMessage.innerText = "Last Name Not Valid";
            return false;
        default:
            errorMessage.innerText = "";
            return true;
    }
}

// Handling Form Submitting 
form.addEventListener('submit', (e) => {

    validateEmail();
    validatePassword();

    if (!validateEmail() || !validatePassword()) {
        e.preventDefault();
    } else {
        e.submit();
    }
})
