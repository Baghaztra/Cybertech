@extends('admin.layouts.app')
@section('title', 'responses')
@section('content')
    <div class="card-body">
        <h3>
            Response for {{ $form->title }}
            <span class="badge badge-success">{{ $form->responses->count() }}</span>
        </h3>
        <div id="content_answer" class="row"></div>

    </div>
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/response.js'])
@endsection
