@extends('admin.layouts.app')
@section('title', 'form')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-info btn-rounded" id="btnCreate"><i class="fas fa-plus"></i></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tblUsers" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- modal section --}}
    @include('admin.form.modal')
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/form.js'])
@endsection
