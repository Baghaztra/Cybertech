import { getServerName } from "../setUp";

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
                $('#create-form')[0].reset();
                $('#questions-wrapper').empty();
                $('#error-messages').empty();
            },
            error: (err) => {
                console.log(err)
            }
        });
    });
});