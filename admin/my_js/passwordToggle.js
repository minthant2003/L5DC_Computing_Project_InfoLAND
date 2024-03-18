document.addEventListener('DOMContentLoaded', () => {
    const passLogin = document.getElementById("pass-login");
    const toggleLogin = document.getElementById("toggle-login");

    const process = (input, toggle) => {
        var type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        toggle.children[0].classList.toggle('mdi-eye-off');
        let output = toggle.children[1].innerHTML === 'Show' ? 'Hide' : 'Show';
        toggle.children[1].innerHTML = output;
    }

    toggleLogin.addEventListener('click', () => process(passLogin, toggleLogin));
});