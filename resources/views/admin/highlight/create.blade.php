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
        <h3>Create New Highlight</h3>
        <a href="/admin/highlight" class="btn btn-sm btn-danger">Cancel</a>
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

            <div class="form-group mb-3" id="groupTitle">
                <label for="subtitle">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" placeholder="Event Subtitle" value="{{ old('subtitle') }}">
                @error('subtitle')
                    <small id="errSubTitle" class="text-danger form-text">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            
            <div class="form-group mb-3" id="groupTitle">
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
    
@endsection
