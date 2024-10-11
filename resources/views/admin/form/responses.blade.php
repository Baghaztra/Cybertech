@extends('admin.layouts.app')
@section('title', 'responses')
@section('content')
    <div class="card-body">
        <div class="table-responsive">
            <table id="tblResponses" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Form name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Form name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/response.js'])
@endsection
