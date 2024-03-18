document.addEventListener('DOMContentLoaded', () => {
    const signOut = document.getElementById('sign-out');

    signOut.addEventListener('click', async (e) => {
        e.preventDefault();
        let filename = window.location.pathname.split('/').pop();
        let url;

        url = (filename === 'index.php' || filename === '') ? 'adminLogoutServer.php' 
            : '../../adminLogoutServer.php';

        let response = await fetch(url, { method: "GET" });
        let res = await response.json();

        if (res.msg) alert(res.msg);
        if (res.success) {
            (filename === 'index.php' || filename === '') ? window.location.href = 'index.php' 
                : window.location.href = '../../index.php';
        }
    });
});