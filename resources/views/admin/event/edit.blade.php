@extends('admin.layouts.app')
@section('content')
    {{-- Input gambar --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="justify-content-start mb-3">
        <h3>Edit Event "{{ $event->title }}"</h3>
        <a href="/admin/event" class="btn btn-sm btn-danger" id="btn-back">Cancel</a>
    </div>
    <div class="card-body">
        <form action="/admin/event/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <input type="hidden" id="hdnID" style="display: none;">
            <div class="form-group" id="groupTitle">
                <label for="eventTitle">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Event title"
                    value="{{ old('title',$event->title) }}">
                @error('title')
                    <small id="errTitle" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group mb-3" id="groupImage">
                <label for="media">Image</label>
                <input type="file" name="media" id="media" class="filepond" accept="image/">
                @error('media')
                    <small id="errMedia" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group" id="groupDescription">
                <label for="eventDescription">Description</label>
                <div id="editor">
                    {!! old('description', $event->description) !!}
                </div>
                @error('description')
                    <small id="errDescription" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
                <textarea id="description" name="description" style="display:none;"></textarea>

            </div>
            <div class="form-group" id="groupRegistrationURL">
                <label for="registrationUrl">Registration URL (optional)</label>
                <input type="text" name="registration_url" id="registrationUrl" class="form-control"
                    placeholder="Registration URL" value="{{ old('registration_url', $event->registration_url) }}">
                @error('registration_url')
                    <small id="errRegistrationUrl" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group" id="groupDate">
                <label for="eventDate">Event Date</label>
                <input type="date" id="event_date" name="event_date" class="form-control"
                    value="{{ old('event_date', $event->event_date) }}">
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
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Texteditor
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
        
            
        // Input file
        // Setup FilePond
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
    
        @if(isset($files))
            @foreach($files as $file)
                // Mengambil file dari URL
                fetch('{{ url("media/tmp/{$file['folder']}/{$file['file']}") }}')
                    .then(response => response.blob())
                    .then(blob => {
                        // Buat objek File dari blob
                        const file = new File([blob], '{{ $file["file"] }}', {
                            type: blob.type,
                            lastModified: Date.now()
                        });
                        // Tambahkan file ke FilePond
                        pond.addFile(file).catch(error => {
                            console.error('Gagal menambahkan file:', error);
                        });
                    })
                    .catch(error => {
                        console.error('Gagal mengambil file:', error);
                    });
            @endforeach
        @endif

        FilePond.setOptions({
            server: {
                process: '/admin/uploadMedia/event',
                revert: '/admin/deleteMedia/event',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            // maxFiles: 20,
            allowMultiple: true,
        });
        
        document.getElementById('btn-back').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah navigasi langsung

            if (confirm('Perubahan tidak akan tersimpan')) {
                fetch('/admin/emptyTemporary', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/admin/event';
                    } else {
                        alert('Gagal menghapus temporary data.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
@endsection
