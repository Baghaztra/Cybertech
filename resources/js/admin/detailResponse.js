import { getServerName } from "../setUp";

$(document).ready(function () {
    // Extract form ID from the URL
    const formId = window.location.pathname.split('/').pop();

    // Initialize DataTable
    var table = $("#tblResponses").DataTable({
        ajax: {
            url: `${getServerName()}/responses/${formId}`,
            dataSrc: function (json) {
                // Transform the response data into a format DataTables can use
                const transformedData = [];
                console.log(json.data);
                
                Object.keys(json.data).forEach((responseCode, index) => {
                    const answers = json.data[responseCode];
                    const row = { no: index + 1 };
                    answers.forEach(answer => {
                        row[answer.question.question_text] = answer.answer;
                    });
                    row.action = `
                        <a class="btn btn-sm btn-info" href="/admin/responses/${responseCode}" id="detailBtn">
                            <i class="fas fa-info"></i>
                        </a>
                    `;
                    transformedData.push(row);
                });
                return transformedData;
            }
        },
        error: function (xhr, error, thrown) {
            console.error("Error fetching data: ", xhr, error, thrown);
        },
        columns: [
            { data: "no" },
            ...$(`#tblResponses thead th`).map(function() {
                const headerText = $(this).text().trim();
                return { data: headerText };
            }).get().slice(1, -1), // Skip the "No" and "Action" columns
            { data: "action", orderable: false }
        ]
    });
});