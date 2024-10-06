import { getServerName, showNotif } from "../setUp";
import { create, update, deleteItem } from "../crud";

$(document).ready(function () {
    var table = $("#tbl").DataTable({
        ajax: {
            url: getServerName() + "/events/all"
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
                            <a href="/admin/event/${data.id}/edit" data-id="${data.id}" class="btn btn-sm col-sm-3 btn-warning" id="editBtn"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm col-sm-3 btn-danger" data-id="${data.id}" data-title="${data.title}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                        </div>
                    `;
                },
                orderable: false
            }
        ],

        pageLength: 5,
    });

    // Create event
    $(document).on('click', '#btnCreate', function (event) {
        event.preventDefault(); // Mencegah navigasi default
    
        // Memanggil endpoint untuk mengosongkan temporary images
        $.ajax({
            type: 'DELETE',
            url: '/admin/emptyTemporary',
            success: function () {
                // Jika berhasil, redirect ke halaman create event
                window.location.href = '/admin/event/create';
            },
            error: function () {
                alert('Gagal mengosongkan temporary images');
            }
        });
    });

    // Edit event
    $(document).on('click', '#editBtn', function (event) {
        event.preventDefault(); // Mencegah navigasi default
        const eventId = $(this).data('id'); 
    
        // Memanggil endpoint untuk mengosongkan temporary images
        $.ajax({
            type: 'DELETE',
            url: '/admin/emptyTemporary',
            success: function () {
                // Jika berhasil, redirect ke halaman edit event
                window.location.href = '/admin/event/' + eventId + '/edit';
            },
            error: function () {
                alert('Gagal mengosongkan temporary images');
            }
        });
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
                    $('#modal #images').html("");
                    images.forEach(url => {
                        const imgElement = `<img src="${url}" alt="gambar" style="width: 10rem; height: auto;" class="col-6">`;
                        $('#modal #images').append(imgElement);
                    });
                    

                    if (response.data.registration_url != null) {
                        $('#modal a#url').attr('href', response.data.registration_url);
                    }else{
                        $('#modal a#url').attr('href', '/admin/form');
                    }
                }

            }
        });
        $('#modal').modal('show');
    });

    // Manage images
    $(document).on('click', '#btnManageImages', function () {
        $('#modal').modal('hide');
        $('#modal2').modal('show');

        $.ajax({
            type: 'GET',
            url: '/events/all', // assuming this is the endpoint for your Laravel API
            dataType: 'json',
            success: function(data) {
              var table = '<table class="table table-hover">';
              table += '<thead><tr><th>Images</th></tr></thead>';
              table += '<tbody>';
              $.each(data.data[0].images, function(index, value) {
                table += '<tr data-image-id="' + value.id + '">';
                table += '<td><img src="' + getServerName() + "/storage/media/" + value.path + '" width="100" height="100"></td>';
                table += '</tr>';
              });
              table += '</tbody>';
              table += '</table>';
              $('#tblImages').html(table);
        
              $('#tblImages tbody tr').on('click', function() {
                var imageId = $(this).data('image-id');
                $.each(data.data[0].images, function(index, value) {
                  if (value.id === imageId) {
                    value.role = 'jumbotron';
                  } else {
                    value.role = 'default';
                  }
                });
                console.log(imageId+" Setted as jumbotron");
                
                // You can also send an AJAX request to update the roles in the database
                $.ajax({
                  type: 'PATCH',
                  url: '/setjumbotron/' + imageId
                });
              });
            },
            error: function(xhr, status, error) {
              console.log('Error:', error);
              console.log('XHR:', xhr);
              console.log('Status:', status);
            }
          });
    });

    $(document).on('click', '#btnCancelImageRole', function () {
        $('#modal2').modal('hide');
        $('#modal').modal('show');
    });


});