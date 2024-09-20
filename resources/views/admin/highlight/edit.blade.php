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
        <h3>Edit "{{ $highlight->title }}"</h3>
        <a href="/admin/highlight" class="btn btn-sm btn-danger" id="cancel-btn">Cancel</a>
    </div>
    <div class="card-body">
        <form action="/admin/highlight/{{ $highlight->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="form-group mb-3" id="groupTitle">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Event Title" value="{{ old('title', $highlight->title) }}">
                @error('title')
                    <small id="errTitle" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group mb-3" id="groupSubitle">
                <label for="subtitle">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" placeholder="Event Subtitle" value="{{ old('subtitle', $highlight->subtitle) }}">
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
                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $highlight->description) }}</textarea>
                @error('description')
                    <small id="errDescription" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group mb-3" id="groupURL">
                <label for="Url">URL (optional)</label>
                <input type="text" name="url" id="Url" class="form-control"
                    placeholder=" URL"  value="{{ old('url', $highlight->url) }}">
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
    
        @if(isset($file))
            pond.addFile('{{ url("storage/media/tmp/{$file['folder']}/{$file['file']}") }}');
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

        // Tombol cancel
        document.getElementById('cancel-btn').addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah link default berjalan

            if (confirm('Perubahan yang anda lakukan akan hilang')) {
                // Lakukan request DELETE menggunakan fetch
                fetch('/admin/emptyTemporary', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect ke halaman setelah sukses
                        window.location.href = '/admin/highlight';
                    } else {
                        alert('Gagal menghapus data sementara.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script> 
@endsection
