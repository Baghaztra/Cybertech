import { getServerName, showNotif } from "../setUp";
import { create, update, deleteItem } from "../crud";

$(document).ready(function () {
    var table = $("#tbl").DataTable({
        ajax: {
            url: getServerName() + "/highlight/all"
        },
        columns: [
            { 
                data: null, 
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: "title" },
            { data: "subtitle" },
            { data: "description" },
            { data: "image_id" },
            { data: "url" },
            {
                data: null,
                render: function (data) {
                    return `
                    <div style="gap: 5px;" class="row">
                        <a href="/admin/highlight/${data.id}/edit" class="btn btn-sm col-sm-4 btn-warning" id="editBtn"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm col-sm-4 btn-danger" data-id="${data.id}" data-title="${data.title}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                    </div>
                    `;
                },
                orderable: false
            }
        ],

        pageLength: 5,
    });

    // Delete
    $(document).on("click", "#deleteBtn", function () {
        var highlightId = $(this).data('id');
        var title = $(this).data('title');
        var endpoint = "/admin/highlight/" + highlightId;
        swal({
            title: "Are you sure?",
            text: `Delete ${title}?`,
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
                deleteItem("Delete Event", getServerName(), endpoint, table);
            }
        });
    });
});