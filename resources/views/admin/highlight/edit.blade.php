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

    <div class="justify-content-start mb-3">
        <h3>Edit "{{ $highlight->title }}"</h3>
        <a href="/admin/highlight" class="btn btn-sm btn-danger">Cancel</a>
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

@endsection
