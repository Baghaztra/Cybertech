import { getServerName, showNotif } from "../setUp";
import { create, update, deleteItem } from "../crud";

$(document).ready(function () {
    var table = $("#tbl").DataTable({
        ajax: {
            url: getServerName() + "/event/all"
        },
        columns: [
            { 
                data: null, 
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: "title" },
            { data: "event_date" },
            {
                data: null,
                render: function (data) {
                    return `
                        <div style="gap: 5px;" class="row">
                            <button class="btn btn-sm col-sm-3 btn-info" data-id="${data.id}" id="detailBtn"><i class="fas fa-info"></i></button>
                            <a href="/admin/event/${data.id}/edit" class="btn btn-sm col-sm-3 btn-warning" id="editBtn"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm col-sm-3 btn-danger" data-id="${data.id}" data-title="${data.title}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                        </div>
                    `;
                },
                orderable: false
            }
        ],

        pageLength: 5,
    });

    // Delete event
    $(document).on("click", "#deleteBtn", function () {
        var eventId = $(this).data('id');
        var endpoint = "/admin/event/" + eventId;
        swal({
            title: "Are you sure?",
            text: `Delete event with ID ${eventId}?`,
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
            url: getServerName() + "/admin/event/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                console.log(response.data);
                console.log(response.imageUrls);
                if (response.status === 200) {
                    $('#modal #title').html(response.data.title);
                    $('#modal #event_date').html(response.data.event_date);
                    $('#modal #description').html(response.data.description);
                    const images = response.imageUrls;
                    images.forEach(url => {
                        const imgElement = `<img src="${url}" alt="gambar" style="width: 10rem; height: auto;" class="col-6">`;
                        $('#modal #images').append(imgElement);
                    });
                    

                    if (response.data.registration_url != null) {
                        $('.modal-footer').show();
                        $('#modal a#url').attr('href', response.data.registration_url);
                    }else{
                        $('.modal-footer').hide();
                    }
                }

            }
        });
        $('#modal').modal('show');
    });
});