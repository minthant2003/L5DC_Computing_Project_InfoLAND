document.addEventListener('DOMContentLoaded', () => {
    const passLogin = document.getElementById("passwordlogin");
    const toggleLogin = document.getElementById("togglelogin");
    const passRegis = document.getElementById("passwordreg");
    const toggleRegis = document.getElementById("togglereg");
    const passConRegis = document.getElementById("confirm-password-regis");
    const toggleConRegis = document.getElementById("toggleconfirm-regis");
    const passChg = document.getElementById("passwordchg");
    const toggleChg = document.getElementById("togglechg");    
    const passConChg = document.getElementById("confirm-password-chg");
    const toggleConChg = document.getElementById("toggleconfirm-chg");    
    const passProfile = document.getElementById("profile-pass");    
    const toggleProfile = document.getElementById("profile-pass-toggle");    
    const passConProfile = document.getElementById("profile-con-pass");    
    const toggleConProfile = document.getElementById("profile-con-pass-toggle");    

    const process = (input, toggle) => {
        var type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        toggle.children[0].classList.toggle('fa-eye-slash');
        let output = toggle.children[1].innerHTML === 'Show' ? 'Hide' : 'Show';
        toggle.children[1].innerHTML = output;
    }

    // To be able to use this .js file across all the entire project
    let filename = window.location.pathname.split('/').pop();

    if (filename === 'register_login.php') {
        toggleLogin.addEventListener('click', () => process(passLogin, toggleLogin));
        toggleRegis.addEventListener('click', () => process(passRegis, toggleRegis));
        toggleConRegis.addEventListener('click', () => process(passConRegis, toggleConRegis));
        toggleChg.addEventListener('click', () => process(passChg, toggleChg));
        toggleConChg.addEventListener('click', () => process(passConChg, toggleConChg));
    } else if (filename === 'profile.php') {
        toggleProfile.addEventListener('click', () => process(passProfile, toggleProfile));
        toggleConProfile.addEventListener('click', () => process(passConProfile, toggleConProfile));
    }
})