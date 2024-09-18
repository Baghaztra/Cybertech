@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="/admin/highlight/create" class="btn btn-info btn-rounded" id="btnCreate"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tbl" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Desciption</th>
                        <th>Image_id</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Desciption</th>
                        <th>Image_id</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@section('scriptPages')
    @vite(['resources/js/admin/highlight.js'])
@endsection
