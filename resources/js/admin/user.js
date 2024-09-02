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
            { data: null, render: function (data) { `<button class="btn btn-sm btn-info" id="${data.id}">Edit</button>` } }
        ],

        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
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

});