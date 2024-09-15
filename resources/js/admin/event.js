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
                    return `<div style="gap: 5px;" class="row">
                <button class="btn btn-sm col-sm-4 btn-info" data-id="${data.id}" id="detailBtn"><i class="fas fa-info"></i></button>
                <a href="/admin/event/${data.id}/edit" class="btn btn-sm col-sm-4 btn-warning" id="editBtn"><i class="fas fa-edit"></i></a>
                <button class="btn btn-sm col-sm-4 btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>`;
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

    // // Edit event
    // $(document).on("click", "#editBtn", function () {
    //     var eventId = $(this).data('id');
    //     $('#modal #modalTitle').text('Edit Event');
    //     $.ajax({
    //         type: "GET",
    //         url: getServerName() + "/admin/event/" + eventId,
    //         success: function (response) {
    //             if (response.status === 200) {
    //                 $('#modal input#title').val(response.data.title);
    //                 $('#modal input#description').val(response.data.description);
    //                 $('#modal input#event_date').val(response.data.event_date);
    //                 $('#modal input#registration_url').val(response.data.registration_url);
    //             }
    //         },
    //         error: (ere)=>{
    //             console.log(ere);
                
    //         }
    //     });
    //     $('#modal').modal('show');
    //     $('#modal button.btnSave').off('click').on('click', function () {
    //         var fields = [
    //             { name: 'title', value: $('#title').val() },
    //             { name: 'description', value: $('#description').val() },
    //             { name: 'event_date', value: $('#event_date').val() },
    //             { name: 'registration_url', value: $('#registrationUrl').val() }
    //         ];
    //         update("Edit Event", fields, getServerName(), "/admin/event/" + eventId, table, 'modal');
    //     });
    // });

    // // Preview image before upload
    // $(document).on("change", "#eventImages", function () {
    //     var preview = $("#imagePreview");
    //     preview.empty(); // Clear previous previews
    //     var files = $(this)[0].files;

    //     if (files.length > 0) {
    //         $.each(files, function (i, file) {
    //             var reader = new FileReader();
    //             reader.onload = function (e) {
    //                 preview.append('<img src="' + e.target.result + '" class="img-thumbnail" width="150" height="150" style="margin-right: 10px;"/>');
    //             };
    //             reader.readAsDataURL(file);
    //         });
    //     }
    // });

    // // Create event with images
    // $(document).on("click", "#btnCreate", function () {
    //     $('#modal #modalTitle').text('Add New Event');
    //     $('#modal').modal('show');

    //     $('#modal button.btnSave').off('click').on('click', function () {
    //         var formData = new FormData();

    //         // Get event fields
    //         formData.append('title', $('#title').val());
    //         formData.append('description', $('#description').val());
    //         formData.append('event_date', $('#event_date').val());
    //         formData.append('registration_url', $('#registrationUrl').val());

    //         // Get image files
    //         var files = $('#eventImages')[0].files;
    //         if (files.length > 0) {
    //             $.each(files, function (i, file) {
    //                 formData.append('images[]', file); // "images[]" to handle multiple files
    //             });
    //         }

    //         // Call the create function
    //         createWithImages("Create Event", formData, getServerName(), "/admin/event", table, 'modal');
    //     });
    // });

    // function createWithImages(title, formData, server, url, table, modal) {
    //     $.ajax({
    //         url: server + url,
    //         type: "POST",
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             if (response.success) {
    //                 // Handle success (e.g., refresh table or show notification)
    //                 $('#' + modal).modal('hide');
    //             } else {
    //                 // Handle errors
    //             }
    //         },
    //         error: function (xhr) {
    //             // Handle error
    //         }
    //     });
    // }

});