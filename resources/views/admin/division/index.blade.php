@extends('admin.layouts.app') @section('content') <div class="card-body">
  <div class="table-responsive">
    <table id="tblUsers" class="display table table-striped table-hover">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Division</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Nomor</th>
          <th>Division</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </tfoot>
      <tbody></tbody>
    </table>
  </div>
</div> @endsection @section('scriptPages') @vite(['resources/js/admin/division.js']) @endsection