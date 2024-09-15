@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-start mb-3">
        {{-- Tombol cancel --}}
    </div>
    <div class="card-body">
        {{-- Form creater disini --}}
        <form action="/admin/post" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdnID" style="display: none;">
                <div class="form-group" id="groupTitle">
                    <label for="eventTitle">Title</label>
                    <input type="text" id="title" class="form-control" placeholder="Event title">
                    <small id="errTitle" class="text-danger form-text"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gambar">Media</label>
                    <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" multiple>
                    <div id="preview-container"></div>
                    <div id="preview-youtube"></div>
                    <label class="form-label" for="gambar">
                        <div id="img-preview" class="img-thumbnail" style="width: 300px; height: 150px; display: flex; justify-content: center; align-items: center; cursor: pointer; background-color: aliceblue">
                            <i data-feather="plus" style="width: 100px; height: 100px;"></i>
                        </div>
                    </label>
                    <div class="input-group mb-3">
                        <input type="text" id="youtube-link" class="form-control" placeholder="Masukkan link YouTube">
                        <button class="btn btn-primary" type="button" id="addYouTubeVideo">Tambahkan</button>
                    </div>
                    <input type="hidden" name="youtube_links" id="youtube-links">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <script src="/js/InputMediaCreate.js"></script>
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <div id="editor">
                        {!! old('content') !!}
                    </div>
                    <textarea id="content" name="content" style="display:none;"></textarea>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                const isiBeritaTextarea = document.querySelector('#content');
                                editor.model.document.on('change:data', () => {
                                    isiBeritaTextarea.value = editor.getData();
                                });
                                const form = isiBeritaTextarea.closest('form');
                                form.addEventListener('submit', () => {
                                    isiBeritaTextarea.value = editor.getData();
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
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
        </form>
    </div>

@endsection

@section('scriptPages')
    @vite(['resources/js/admin/InputMediaCreate.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endsection
