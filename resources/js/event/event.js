import { getServerName, showNotif } from "../setUp";

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
                <button class="btn btn-sm col-sm-4 btn-warning" data-id="${data.id}" id="editBtn"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm col-sm-4 btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                </div>`;
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

    // Delete event
    $(document).on("click", "#deleteBtn", function () {
        var eventId = $(this).data('id');
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
                $.ajax({
                    type: "POST",
                    url: getServerName() + "/admin/event/" + eventId,
                    data: { _method: "DELETE" },
                    success: function (response) {
                        if (response.status === 200) {
                            table.ajax.reload(null,false);
                            showNotif({
                                message: response.message,
                                icon: "fa fa-bell",
                                title: "Notification"
                            }, 'danger', 3000, 500);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    });

    // Edit event
    $(document).on("click", "#editBtn", function () {
        var eventId = $(this).data('id');
        $('#modal #modalTitle').text('Edit Event');
        $.ajax({
            type: "GET",
            url: getServerName() + "/admin/event/" + eventId,
            success: function (response) {
                if (response.status === 200) {
                    $('#modal input#title').val(response.data.title);
                    $('#modal input#description').val(response.data.description);
                    $('#modal input#event_date').val(response.data.event_date);
                }
            }
        });
        $('#modal').modal('show');
        $('#modal button.btnSave').off('click').on('click', function () {
            updateEvent(eventId);
        });
    });

    // Create event
    $(document).on("click", "#btnCreate", function () {
        clearInput();
        $('#modal #modalTitle').text('Add New Event');
        $('#modal').modal('show');
        $('#modal button.btnSave').off('click').on('click', function () {
            createEvent();
        });
    });
    
    // Detail event
    $(document).on("click", "#detailBtn", function () {
        clearInput();
        $('#modalDetail #modalTitle').text('Add New Event');
        $('#modalDetail').modal('show');
        $('#modalDetail button.btnSave').off('click').on('click', function () {
            createEvent();
        });
    });


    // fonction
    function createEvent() {
        var data = new FormData();
        // ubah sesuai field
        data.append('title', $('#title').val());
        data.append('description', $('#description').val());
        data.append('event_date', $('#event_date').val());
        data.append('registration_url', $('#registrationUrl').val());

        $.ajax({
            type: "POST",
            url: getServerName() + "/admin/event",
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 200) {
                    $('#modal').modal('hide');
                    table.ajax.reload(null,false);
                    showNotif({
                        message: response.message,
                        icon: "fa fa-bell",
                        title: "Notification"
                    }, 'success', 3000, 500);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function updateEvent(eventId) {
        var data = new FormData();
        // ubah sesuai field
        data.append('title', $('#title').val());
        data.append('description', $('#description').val());
        data.append('event_date', $('#event_date').val());
        data.append('registration_url', $('#registration_url').val());

        data.append('_method', 'PUT');
        $.ajax({
            type: "POST",
            url: getServerName() + "/admin/event/" + eventId,
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 200) {
                    $('#modal').modal('hide');
                    table.ajax.reload(null,false);
                    showNotif({
                        message: response.message,
                        icon: "fa fa-bell",
                        title: "Notification"
                    }, 'success', 3000, 500);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function clearInput() {
        $('#modal input').val('');
    }
});
