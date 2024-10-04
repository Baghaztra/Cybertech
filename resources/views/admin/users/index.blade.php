@extends('admin.layouts.app')
@section('title', 'users')
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- modal section --}}
    @include('admin.users.modal')
@endsection

@section('scriptPages')
    @vite(['resources/js/admin/user.js'])
@endsection
