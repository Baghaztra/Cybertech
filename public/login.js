function changeType() {
    const iconSlash = document.getElementById('iconShowPass');
    const inptPass = document.getElementById('password');

    if (inptPass.type === 'password') {
        inptPass.type = 'text';
        iconSlash.classList.remove('fa-eye');
        iconSlash.classList.add('fa-eye-slash');
    } else {
        inptPass.type = 'password';
        iconSlash.classList.remove('fa-eye-slash');
        iconSlash.classList.add('fa-eye');
    }
}
