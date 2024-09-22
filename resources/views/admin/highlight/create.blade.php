@extends('admin.layouts.app')
@section('content')

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

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
        <h3>Create New Highlight</h3>
        <a href="/admin/highlight" id="btn-back" class="btn btn-sm btn-danger">Cancel</a>
    </div>
    <div class="card-body">
        <form action="/admin/highlight" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3" id="groupTitle">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Event Title" value="{{ old('title') }}">
                @error('title')
                    <small id="errTitle" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group mb-3" id="groupSubtitle">
                <label for="subtitle">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" placeholder="Event Subtitle" value="{{ old('subtitle') }}">
                @error('subtitle')
                    <small id="errSubTitle" class="text-danger form-text">
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
            
            <div class="form-group mb-3" id="groupDescription">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <small id="errDescription" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group mb-3" id="groupURL">
                <label for="Url">URL (optional)</label>
                <input type="text" name="url" id="Url" class="form-control"
                    placeholder=" URL"  value="{{ old('url') }}">
                @error('url')
                    <small id="errUrl" class="text-danger form-text">
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
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
    
        @if(isset($files))
            @foreach($files as $file)
                pond.addFile('{{ url("storage/media/tmp/{$file['folder']}/{$file['file']}") }}');
            @endforeach
        @endif

        FilePond.setOptions({
            server: {
                process: '/admin/uploadMedia/highlight',
                revert: '/admin/deleteMedia/highlight',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            maxFiles: 1,
            allowMultiple: false,
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
                        window.location.href = '/admin/highlight';
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
