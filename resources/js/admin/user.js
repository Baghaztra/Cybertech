import { getServerName } from "../setUp";

$(document).ready(function () {
    $("#tblUsers").DataTable({
        ajax: {
            url: getServerName() + "/user/all"
        },
        columns: [
            { data: "id" },
            { data: "username" },
            { data: "email" },
            {
                data: null, render: function (data) {
                    return `<div style="gap: 10px;">
                <button class="btn btn-sm btn-info" data-id="${data.id}" id="editBtn"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                </div>` }
            }
        ],

        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function (index) {
                    // Skip kolom "aksi", misal di indeks 3
                    if (index === 3) return;

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
        }
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
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                });
            }
        });
    });

    $(document).on("click", "#editBtn", function (e) {

    });

    $(document).on('click', '#btnCreate', function () {
        $('#modalUser #titleUser').text('Add User')
        $('#modalUser').modal('show');
    });

    $(document).on("click", "#btnSave", function () {
        var data = new FormData();
        data.append('txtUsername', $('#username').val());
        data.append('txtEmail', $('#email').val());
        data.append('txtPassword', $('#password').val());
        $.ajax({
            type: "post",
            url: "/admin/user",
            data: data,
            processData: false,
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                alert(response)
            },
            error: function (err) {
                console.log(err)
            }
        });
    });

});