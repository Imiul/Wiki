/* Global Variable Used */
const form = document.querySelector('form');

const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const errorMessage = document.querySelectorAll('.errorMessage');

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

// Validate INputs On Key Up 
emailInput.addEventListener('input', ()=> validateEmail());
passwordInput.addEventListener('input', ()=> validatePassword());

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
