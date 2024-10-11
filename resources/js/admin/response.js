import { getServerName } from "../setUp";
import { create, update, deleteItem } from "../crud";

$(document).ready(function () {
    var table = $("#tblResponses").DataTable({
        ajax: {
            url: getServerName() + "/forms/all",
        },
        error: function (xhr, error, thrown) {
            console.error("Error fetching data: ", xhr, error, thrown);
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { 
                data: null,
                render: (data)=>{
                    return `<h1>${Object.keys(data).length}</h1>`;
                }
            },
            {
                data: null,
                render: function (data) {
                    return `
                    <a class="btn btn-sm col-sm-3 btn-info" href="/admin/responden/${data.id}" id="detailBtn"><i class="fas fa-info"></i></a>
                    `;
                },
                orderable: false
            }
        ]
    });
});