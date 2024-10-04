<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="titleForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleForm">
                    Modal title
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-form">
                    <div class="error-area"></div>
                    <div class="form-group" id="formTitle">
                        <label for="title">Form Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        <small class="text-danger form-text" id="errTitle"></small>
                    </div>

                    <div class="form-group" id="formDescription">
                        <label for="description">Form Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div id="questions-wrapper" class="form-group">
                        <h3>Questions</h3>
                        <div class="question-group mb-3" style="position: relative">
                            <label for="question_text_1">Question 1</label>
                            <input type="text" name="questions[0][question_text]" id="question_text_1"
                                class="form-control" required>

                            <label for="question_type_1">Question Type</label>
                            <select name="questions[0][question_type]" id="question_type_1"
                                class="form-control question-type" required>
                                <option value="text">Text</option>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="checkbox">Checkbox</option>
                            </select>

                            <div class="options-wrapper" style="display:none;">
                                <label for="options_1">Options</label>
                                <div class="option-group">
                                    <input type="text" name="questions[0][options][]" class="form-control mb-2"
                                        placeholder="Option 1">
                                </div>
                                <button type="button" class="btn btn-secondary  btn-sm add-option-btn">Add
                                    Option</button>
                            </div>

                            <button type="button"
                                class="btn btn-outline-transparent btn-sm btn-round remove-question-btn"
                                style="position: absolute; top: 0; right: -10px;">X</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" id="add-question-btn" class="btn btn-sm btn-primary">Add Question</button>
                <button type="button" class="btn btn-sm btn-primary btnSave">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    let questionCount = 1;

    document.getElementById('add-question-btn').addEventListener('click', function() {
        const questionWrapper = document.getElementById('questions-wrapper');
        const newQuestion = document.createElement('div');
        newQuestion.classList.add('question-group');
        newQuestion.innerHTML = `
                    <div style="position: relative;" class="mb-3">
                        <label for="questions[${questionCount}][question_text]">Question ${questionCount + 1}</label>
                        <input type="text" name="questions[${questionCount}][question_text]" id="question_text_${questionCount + 1}" class="form-control" required>

                        <label for="questions[${questionCount}][question_type]">Question Type</label>
                        <select name="questions[${questionCount}][question_type]" id="questions[${questionCount}][question_type]" class="form-control question-type" required>
                            <option value="text">Text</option>
                            <option value="multiple_choice">Multiple Choice</option>
                            <option value="checkbox">Checkbox</option>
                        </select>

                        <div class="options-wrapper" style="display:none;">
                            <label for="questions[${questionCount}][options][]">Options</label>
                            <div class="option-group">
                                <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-2" placeholder="Option 1">
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary add-option-btn">Add Option</button>
                        </div>

                        <button type="button" class="btn btn-outline-transparent btn-sm btn-round remove-question-btn" style="position: absolute; top: 0; right: -10px;">X</button>
                    </div>
                    `;
        questionWrapper.appendChild(newQuestion);
        questionCount++;
    });

    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('question-type')) {
            const optionsWrapper = e.target.closest('.question-group').querySelector('.options-wrapper');
            if (e.target.value == 'multiple_choice' || e.target.value == 'checkbox') {
                optionsWrapper.style.display = 'block';
            } else {
                optionsWrapper.style.display = 'none';
            }
        }
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-option-btn')) {
            const optionGroup = e.target.previousElementSibling;
            const newOption = document.createElement('input');
            newOption.setAttribute('type', 'text');
            newOption.setAttribute('name', `questions[${questionCount - 1}][options][]`);
            newOption.classList.add('form-control', 'mb-2');
            newOption.setAttribute('placeholder', `Option ${optionGroup.children.length + 1}`);
            optionGroup.appendChild(newOption);
        } else if (e.target.classList.contains('remove-question-btn')) {
            e.target.closest('.question-group').remove();
        }
    });
</script>
