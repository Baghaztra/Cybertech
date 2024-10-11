@extends('admin.layouts.app')
@section('title', 'responses')
@section('content')
    <div class="card-body">
        <h3>Response for {{ $form->title }}</h3>
        <div class="table-responsive">
            <table id="tblResponses" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        @foreach ($form->questions as $question)
                            <th>{{ $question->question_text }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        @foreach ($form->questions as $question)
                        <th>{{ $question->question_text }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/detailResponse.js'])
@endsection
