function test() {
    const chkShowPass = document.getElementById('showPass');
    const inptPass = document.getElementById('password');

    chkShowPass.checked ? inptPass.type = 'text' : inptPass.type = 'password'
}