$(document).ready(function () {
    $(document).on('click', '#btnLogin', () => {
        var data = new FormData();
        data.append('email', $('#email').val());
        data.append('password', $('#password').val());
        $.ajax({
            type: "POST",
            url: "/admin/login",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: () => {
                $('#btnLogin').text('Memproses...');
            },
            success: function (response) {
                $('#btnLogin').text('Login');
                window.location.href = response.redirect;
            },
            error: (err) => {
                console.log(err)
                $('#btnLogin').text('Login');
                var errorVar = '';
                if (err.responseJSON.errors) {
                    Object.keys(err.responseJSON.errors).forEach(field => {
                        if (Array.isArray(err.responseJSON.errors[field])) {
                            err.responseJSON.errors[field].forEach(error => {
                                errorVar += `<li>${error}</li>`;
                            });
                        } else {
                            errorVar += `<li>${err.responseJSON.errors[field]}</li>`;
                        }
                    });
                }
                $('#error-message').html(`<div class="alert alert-danger" style="box-shadow: 0 0 0; background-color: rgba(255, 0, 0, 0.082)" role="alert">
                    <ul>${errorVar !== '' ? errorVar : ''}</ul>
                </div>`)
            }
        });
    });
});