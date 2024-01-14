const passlogin = document.getElementById("passwordlogin");
const togglelogin = document.getElementById("togglelogin");
const passreg = document.getElementById("passwordreg");
const togglereg = document.getElementById("togglereg");
const passcon = document.getElementById("confirm-password");
const togglecon = document.getElementById("toggleconfirm");

const process = (input, icon) => {
    var type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);

    icon.classList.toggle('fa-eye-slash');
}

togglelogin.addEventListener('click', () => process(passlogin, togglelogin));
togglereg.addEventListener('click', () => process(passreg, togglereg));
togglecon.addEventListener('click', () => process(passcon, togglecon));