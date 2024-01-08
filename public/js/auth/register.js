/* Global Variable Used */
const form = document.querySelector('form');

const firstNameInput = document.querySelector('input[name="firstName"]');
const lastNameInput = document.querySelector('input[name="lastName"]');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const confirmPasswordInput = document.querySelector('input[name="ConfirmPassword"]');

const pictureInput = document.querySelector('input[name="picture"]');


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

// Validate Email 
function validateEmail() {

    const errorMessage = document.querySelector('.emailInput');
    const EmailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    switch (true) {
        case !emailInput.value:
            errorMessage.innerText = "Email Should Not Be Empty";
            return false;
        case !EmailRegex.test(emailInput.value):
            errorMessage.innerText = "Invalid Email";
            return false;
        default:
            errorMessage.innerText = "";
            return true;
    }
}

// Validate Password
function validatePassword() {

    const errorMessage = document.querySelector('.passwordInput');
    const PasswordRegex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])/;

    switch (true) {
        case !passwordInput.value:
            errorMessage.innerText = "Password Should Not Be Empty";
            return false;
        case passwordInput.value.length < 8:
            errorMessage.innerText = "Password Should Contain Atleast 8 Chr";
            return false;
        case passwordInput.value.length > 25:
            errorMessage.innerText = "Password Should Not Contain More Than 25 Chr";
            return false;
        case !PasswordRegex.test(passwordInput.value):
            errorMessage.innerText = "Password Should Atleast Contain 1 Special Character";
            return false;
        default:
            errorMessage.innerText = "";
            return true;
    }
}

// Validate Picture
function validatePicture() {

    const errorMessage = document.querySelector('.pictureInput');
    const PictureRegex = /^.+\.(png|jpg)$/i;

    switch (true) {
        case !pictureInput.files[0]:
            errorMessage.innerText = "No File Selected";
            return false;
        case !PictureRegex.test(pictureInput.files[0].name):
            errorMessage.innerText = "Invalid File Type. Please upload a .png or .jpg image";
            return false;
        default:
            errorMessage.innerText = "";
            return true;
    }
}


// Validate INputs On Key Up 
firstNameInput.addEventListener('input', ()=> validateFirstName());
lastNameInput.addEventListener('input', ()=> validateLastName());
emailInput.addEventListener('input', ()=> validateEmail());
passwordInput.addEventListener('input', ()=> validatePassword());
pictureInput.addEventListener('change', ()=> validatePicture());

// Handling Form Submitting 
form.addEventListener('submit', (e) => {

    const isFirstNameValid = validateFirstName();
    const isLastNameValid = validateLastName();
    const isEmailValid = validateEmail();
    const isPasswordValid = validatePassword();
    const isPictureValid = validatePicture();

    if (!isFirstNameValid || !isLastNameValid || !isEmailValid || !isPasswordValid || !isPictureValid) {
        e.preventDefault();
    } else {
        // If you intended to submit the form, use form.submit() instead of e.submit()
        // e.submit() is not a valid method, and you should use form.submit()
        form.submit();
    }
})
