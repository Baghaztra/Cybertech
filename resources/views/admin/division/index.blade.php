@extends('admin.layouts.app') @section('content') <div class="card-body">
  <div class="table-responsive">
    <table id="tblUsers" class="display table table-striped table-hover">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
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
</div> @endsection