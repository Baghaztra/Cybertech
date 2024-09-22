import { getServerName } from "../setUp";
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
            // { data: "subtitle" },
            // { data: "description" },
            // { data: "image_id" },
            // { data: "url" },
            {
                data: null,
                render: function (data) {
                    return `
                    <div style="gap: 5px;" class="row">
                        <button class="btn btn-sm col-sm-3 btn-info" data-id="${data.id}" id="detailBtn"><i class="fas fa-info"></i></button>
                        <a href="/admin/highlight/${data.id}/edit" class="btn btn-sm col-sm-3 btn-warning" id="editBtn"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm col-sm-3 btn-danger" data-id="${data.id}" data-title="${data.title}" id="deleteBtn"><i class="fas fa-trash"></i></button>
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

    // Detail
    $(document).on('click', '#detailBtn', function () {
        $.ajax({
            type: "GET",
            url: getServerName() + "/admin/highlight/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                console.log(response.data);
                // console.log(response.imageUrl);
                if (response.status === 200) {
                    $('#modal #title').text(response.data.title);
                    $('#modal #subtitle').text(response.data.subtitle);
                    $('#modal #description').text(response.data.description);
                    $('#modal img#image').attr('src', response.imageUrl);
                    if (response.data.url != null) {
                        $('.modal-footer').show();
                        $('#modal a#url').attr('href', response.data.url);
                    }else{
                        $('.modal-footer').hide();
                    }
                }

            }
        });
        $('#modal').modal('show');
    });
});