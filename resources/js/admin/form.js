import { getServerName, showNotif } from "../setUp";

$(document).ready(function () {
    var table = $("#tblUsers").DataTable({
        ajax: {
            url: getServerName() + "/forms/all"
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: "title" },
            { data: "description" },
            {
                data: null,
                render: function (data) {
                    return `<div style="gap: 10px;">
                <a href="${getServerName() + "/form/" + data.id}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-link"></i></a>
                <button class="btn btn-sm btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                </div>`
                },
                orderable: false
            }
        ],
        pageLength: 5,
    });


    $(document).on('click', '#btnCreate', function () {
        var errors = {};
        $('#modalForm #titleForm').text('Create Form');
        $('#modalForm button.btnSave').off('click').attr('id', 'btnCreateForm');
        $('#modalForm').modal('show');
    });

    function setError(errors = {}) {
        console.log(Object.keys(errors).length);

        errors.title ? ($('#formTitle').addClass('has-error'), $('#errTitle').text(errors.title)) : ($('#formTitle').removeClass('has-error'), $('#errTitle').text(''))
        errors.description ? $('#formDescription').addClass('has-error') : $('#formDescription').removeClass('has-error')
    }

    $(document).on('click', '#btnCreateForm', () => {
        let data = $('#create-form').serialize();
        $.ajax({
            type: "POST",
            url: "/admin/form",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response)
                // Reset the form
                $('#modalForm').modal('hide');
                $('#create-form')[0].reset();
                $('#questions-wrapper').empty();
                $('#error-messages').empty();
                table.ajax.reload(null, false);
                var content = {};
                content.message = response.message;
                content.icon = "fa fa-bell";
                content.title = "Notifikasi";
                showNotif(content, 'success', 3000, 500);
            },
            error: (err) => {
                console.log(err)
                if (err.status === 422) {
                    const errors = err.responseJSON.errors;
                    setError(errors);
                }
            }
        });
    });
});