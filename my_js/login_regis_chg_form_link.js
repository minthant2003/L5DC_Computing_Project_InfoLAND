const loginFormLink = document.getElementById('login-form-link');
const chgSectionLink = document.getElementById('chg-section-link');
const regisFormLink = document.getElementById('register-form-link');

const loginForm = document.getElementById('login-form');
const chgSection = document.getElementById('chg-section');
const regisForm = document.getElementById('register-form');

loginFormLink.addEventListener('click', () => {
    loginForm.style.display = 'block';
    chgSection.style.display = 'none';
    regisForm.style.display = 'none';
})

chgSectionLink.addEventListener('click', () => {
    chgSection.style.display = 'block';
    loginForm.style.display = 'none';
    regisForm.style.display = 'none';
})

regisFormLink.addEventListener('click', () => {
    regisForm.style.display = 'block';
    loginForm.style.display = 'none';
    chgSection.style.display = 'none';
})