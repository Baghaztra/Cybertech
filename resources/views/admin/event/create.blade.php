@extends('admin.layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="d-flex justify-content-start mb-3">
        {{-- Tombol cancel --}}
    </div>
    <div class="card-body">
        {{-- Form creater disini --}}
        <form action="/admin/event" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="hdnID" style="display: none;">
                <div class="form-group" id="groupTitle">
                    <label for="eventTitle">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Event title">
                    @error('title')
                    <small id="errTitle" class="text-danger form-text">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="images">Media</label>
                    <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple>
                    <div id="preview-container"></div>
                    <div id="preview-youtube"></div>
                    <label class="form-label" for="images">
                        <div id="img-preview" class="img-thumbnail" style="width: 300px; height: 150px; display: flex; justify-content: center; align-items: center; cursor: pointer; background-color: aliceblue">
                            <i data-feather="plus" style="width: 100px; height: 100px;"></i>
                        </div>
                    </label>
                    <div class="input-group mb-3">
                        <input type="text" id="youtube-link" class="form-control" placeholder="Masukkan link YouTube">
                        <button class="btn btn-primary" type="button" id="addYouTubeVideo">Tambahkan</button>
                    </div>
                    <input type="hidden" name="youtube_links" id="youtube-links">
                    @error('images')
                    <small id="errImages" class="text-danger form-text">
                        {{ $message }}
                    </small>
                    @enderror
                    <script src="/js/InputMediaCreate.js"></script>
                </div>
    
                <div class="form-group" id="groupDescription">
                    <label for="eventDescription">Description</label>
                    <div id="editor">
                        {!! old('description') !!}
                    </div>
                    @error('description')
                    <small id="errDescription" class="text-danger form-text">
                        {{ $message }}
                    </small>
                    @enderror
                    <textarea id="description" name="description" style="display:none;"></textarea>
                    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                const isiBeritaTextarea = document.querySelector('#description');
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
                <div class="form-group" id="groupRegistrationURL">
                    <label for="registrationUrl">Registration URL (optional)</label>
                    <input type="text" name="registration_url" id="registrationUrl" class="form-control" placeholder="Registration URL">
                    @error('registration_url')
                    <small id="errRegistrationUrl" class="text-danger form-text">
                        {{ $message }}
                    </small>
                    @enderror
                </div>                
                <div class="form-group" id="groupDate">
                    <label for="eventDate">Event Date</label>
                    <input type="date" id="event_date" name="event_date" class="form-control">
                    @error('event_date')
                    <small id="errDate" class="text-danger form-text">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary btnSave">Save</button>
        </form>
    </div>

@endsection

@section('scriptPages')
    @vite(['resources/js/admin/InputMediaCreate.js'])
@endsection
