<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="titleUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleUser">
                    Modal title
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="groupUsername">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="masukkan username">
                    <small id="errUsername" class="text-danger form-text"></small>
                </div>
                <div class="form-group" id="groupEmail">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="masukkan email">
                    <small id="errEmail" class="text-danger form-text"></small>
                </div>
                <div class="form-group" id="groupPassword">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="masukkan password">
                    <small id="errPassword" class="text-danger form-text"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-sm btn-primary btnSave">Save</button>
            </div>
        </div>
    </div>
</div>
