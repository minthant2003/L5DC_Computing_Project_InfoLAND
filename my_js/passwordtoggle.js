document.addEventListener('DOMContentLoaded', () => {
    const passlogin = document.getElementById("passwordlogin");
    const togglelogin = document.getElementById("togglelogin");
    const passreg = document.getElementById("passwordreg");
    const togglereg = document.getElementById("togglereg");
    const passcon = document.getElementById("confirm-password");
    const togglecon = document.getElementById("toggleconfirm");

    const process = (input, toggle) => {
        var type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        toggle.children[0].classList.toggle('fa-eye-slash');
        let output = toggle.children[1].innerHTML === 'Show' ? 'Hide' : 'Show';
        toggle.children[1].innerHTML = output;
    }

    togglelogin.addEventListener('click', () => process(passlogin, togglelogin));
    togglereg.addEventListener('click', () => process(passreg, togglereg));
    togglecon.addEventListener('click', () => process(passcon, togglecon));
})