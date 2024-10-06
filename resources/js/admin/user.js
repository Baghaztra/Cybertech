import { getServerName, showNotif } from "../setUp";

$(document).ready(function () {
    var table = $("#tblUsers").DataTable({
        ajax: {
            url: getServerName() + "/users/all"
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: "username" },
            { data: "email" },
            {
                data: null,
                render: function (data) {
                    return `<div style="gap: 10px;">
                <button class="btn btn-sm btn-info" data-id="${data.id}" id="editBtn"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                </div>`
                },
                orderable: false
            }
        ],

        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function (index) {
                    if (index === 0 || index === 3) return;
                    var column = this;
                    var select = $(
                        '<select class="form-select"><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },

    });

    $(document).on("click", "#deleteBtn", function (e) {
        swal({
            title: "Are you sure?",
            text: "kamu Yakin Ingin Menghapus Data Ini?",
            type: "warning",
            buttons: {
                cancel: {
                    visible: true,
                    text: "No, cancel!",
                    className: "btn btn-danger",
                },
                confirm: {
                    text: "Yes, delete it!",
                    className: "btn btn-success",
                },
            },
        }).then((willDelete) => {
            if (willDelete) {
                var data = new FormData();
                data.append('_method', "DELETE");
                $.ajax({
                    type: "POST",
                    url: getServerName() + "/admin/user/" + $(this).data('id'),
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 200 || response.status === 204) {
                            var content = {};
                            content.message = response.message;
                            content.icon = "fa fa-bell";
                            content.title = "Notifikasi";
                            table.ajax.reload(null, false);
                            showNotif(content, 'danger', 3000, 500)
                        }
                    }, error: function (err) {
                        console.log(err)
                    }
                });
            }
        });
    });

    $(document).on("click", "#editBtn", function () {
        $('#modalUser button.btnSave').off('click').attr('id', 'btnEditeForm');
        $('#modalUser #titleUser').text('Form Edit User');
        $.ajax({
            type: "GET",
            url: getServerName() + "/admin/user/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    var errors = {};
                    setError(errors);
                    $('#modalUser input#username').val(response.data.username); // $('') sama dengan kita menggunakan document.querySelector('')
                    $('#modalUser input#hdnID').val(response.data.id);
                    $('#modalUser input#email').val(response.data.email);
                    $('#modalUser input#password').attr('placeholder', 'Change password optional');
                    $('#modalUser #groupPassword label').text('Change password (Optional)');
                }

            }
        });
        $('#modalUser').modal('show');
    });

    $(document).on('click', '#btnCreate', function () {
        var errors = {};
        $('#modalUser #titleUser').text('Form Add User');
        if ($('.btnSave').attr('id') === 'btnEditeForm') {
            $('#modalUser input#password').attr('placeholder', 'masukkan password');
            $('#modalUser #groupPassword label').text('Password');
            clearInput();
            setError(errors);
        }
        $('#modalUser button.btnSave').off('click').attr('id', 'btnCreateForm');
        $('#modalUser').modal('show');
    });

    function setError(errors) {
        errors.username ? ($('#groupUsername').addClass('has-error'), $('#errUsername').text(errors.username)) : ($('#groupUsername').removeClass('has-error'), $('#errUsername').text(''))
        errors.email ? ($('#groupEmail').addClass('has-error'), $('#errEmail').text(errors.email)) : ($('#groupEmail').removeClass('has-error'), $('#errEmail').text(''))
        errors.password ? ($('#groupPassword').addClass('has-error'), $('#errPassword').text(errors.password)) : ($('#groupPassword').removeClass('has-error'), $('#errPassword').text(''))
    }

    function clearInput() {
        $('#modalUser input').val('');
    }

    $(document).on("click", "#btnCreateForm", function () {
        var data = new FormData();
        data.append('username', $('#username').val());
        data.append('email', $('#email').val());
        data.append('password', $('#password').val());
        $.ajax({
            type: "post",
            url: getServerName() + "/admin/user",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    $('#modalUser').modal('hide');
                    clearInput();
                    var erors = {};
                    setError(erors);
                    table.ajax.reload(null, false);
                    var content = {};
                    content.message = response.message;
                    content.icon = "fa fa-bell";
                    content.title = "Notifikasi";
                    showNotif(content, 'success', 3000, 500);
                }
            },
            error: function (err) {
                console.log(err)
                if (err.status === 422) {
                    const errors = err.responseJSON.errors;
                    setError(errors);
                }
            }
        });
    });
    $(document).on("click", "#btnEditeForm", function () {
        var data = new FormData();
        data.append('username', $('#username').val());
        data.append('email', $('#email').val());
        data.append('password', $('#password').val());
        data.append('_method', 'PUT')
        $.ajax({
            type: "post",
            url: getServerName() + "/admin/user/" + $('input#hdnID').val(),
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    $('#modalUser').modal('hide');
                    clearInput();
                    var erors = {};
                    setError(erors);
                    table.ajax.reload(null, false);
                    var content = {};
                    content.message = response.message;
                    content.icon = "fa fa-bell";
                    content.title = "Notifikasi";
                    showNotif(content, 'success', 3000, 500);
                }
            },
            error: function (err) {
                console.log(err)
                if (err.status === 422) {
                    const errors = err.responseJSON.errors;
                    setError(errors);
                }
            }
        });
    });
});