import { getServerName } from "../setUp";

$(document).ready(function () {
    $("#tblDivisions").DataTable({
        ajax: {
            url: getServerName() + "/division/all",
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "description" },
            { data: "image" },
            {
                data: null,
                render: function (data) {
                    return `<div style="gap: 10px;">
                <button class="btn btn-sm btn-info" data-id="${data.id}" id="editBtn"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" data-id="${data.id}" id="deleteBtn"><i class="fas fa-trash"></i></button>
                </div>`;
                },
            },
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
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

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
});
