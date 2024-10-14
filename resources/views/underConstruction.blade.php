<div class="modal fade modal-lg" id="constructionModal" tabindex="-1" role="dialog"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="constructionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center p-5" style="flex-direction: column; font-weight: bold">
                        <h1 style="font-weight: 700">Oops!</h1>
                        <h3 style="font-weight: 500">This page is under construction</h3>
                        <h5 class="text-secondary mb-3">Comming soon</h5>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/underConstruction.png" alt="Construction Illustration"
                        style="width: 100%; height: auto;" class="img-fluid">
                    </div>
                </div>
                <div class="ps-4" style="width: fit-content; position: absolute; bottom: 3rem;">
                    <a href="/event/1" class="btn btn-primary">See something</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    $(document).ready(function() {
        $('#constructionModal').modal('show');
    });
</script>
