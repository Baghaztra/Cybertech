@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="/admin/event/create" class="btn btn-info btn-rounded" id="btnCreate"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tbl" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Event Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Event Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- modal section --}}
    @include('admin.event.modal')
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/event.js'])
@endsection
