<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">
                    Modal Title5
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hdnID" style="display: none;">
                <div class="form-group" id="groupTitle">
                    <label for="eventTitle">Title</label>
                    <input type="text" id="title" class="form-control" placeholder="Event title">
                    <small id="errTitle" class="text-danger form-text"></small>
                </div>
                <div class="form-group" id="groupImages">
                    <label for="eventImages">Upload Images</label>
                    <input type="file" id="eventImages" class="form-control" multiple>
                    <div id="imagePreview" class="mt-2"></div>
                    <small id="errImages" class="text-danger form-text"></small>
                </div>
                <div class="form-group" id="groupDescription">
                    <label for="eventDescription">Description</label>
                    <input type="text" id="description" class="form-control" placeholder="Event description">
                    <small id="errDescription" class="text-danger form-text"></small>
                </div>
                <div class="form-group" id="groupRegistrationURL">
                    <label for="registrationUrl">Registration URL (optional)</label>
                    <input type="text" id="registrationUrl" class="form-control" placeholder="Registration URL">
                    <small id="errRegistrationUrl" class="text-danger form-text"></small>
                </div>                
                <div class="form-group" id="groupDate">
                    <label for="eventDate">Event Date</label>
                    <input type="date" id="event_date" class="form-control">
                    <small id="errDate" class="text-danger form-text"></small>
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
