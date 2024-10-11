import { getServerName } from "../setUp";

$(document).ready(function () {
    var pathArray = window.location.pathname.split('/');
    var form_id = pathArray[pathArray.length - 1];
    
    // Ambil data dari server
    $.ajax({
        url: getServerName() + "/responses/" + form_id,
        method: 'GET',
        success: function (response) {
            if (response.statusCode === 200) {
                displayResponses(response.data);
            }
        },
        error: function (xhr, error, thrown) {
            console.error("Error fetching data: ", xhr, error, thrown);
        }
    });

    function displayResponses(data) {
        const container = $("#content_answer");
        container.empty(); // Bersihkan kontainer sebelum menambahkan konten baru
    
        // Ambil array dari data di bawah kunci kosong
        const responsesArray = data[""]; // Mengambil data dari kunci kosong
    
        // Iterasi setiap response dalam array
        responsesArray.forEach(response => {
            // Buat elemen card untuk setiap response
            const card = $(`
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Response ID: ${response.id}</h5>
                            <ul class="list-group list-group-flush"></ul>
                        </div>
                    </div>
                </div>
            `);
    
            // Tambahkan pertanyaan dan jawaban ke kartu
            const listGroup = card.find('.list-group');
    
            response.answers.forEach(answer => {
                const questionText = answer.question.question_text;
                const answerValue = answer.value !== null ? answer.value : "Tidak ada jawaban";
    
                listGroup.append(`
                    <li class="list-group-item">
                        <strong>Pertanyaan:</strong> ${questionText}<br>
                        <strong>Jawaban:</strong> ${answerValue}
                    </li>
                `);
            });
    
            // Tambahkan kartu ke kontainer
            container.append(card);
        });
    }
    
});
