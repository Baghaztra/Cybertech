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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
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
    <script>
        // Get the search input field and the dropdown list
    const searchInput = document.getElementById('event-search-input');
    const dropdownList = document.getElementById('event_id');

    // Add an event listener to the search input field
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const options = dropdownList.options;

        // Filter the options based on the search term
        for (let i = 0; i < options.length; i++) {
            const option = options[i];
            const optionText = option.text.toLowerCase();

            if (optionText.includes(searchTerm)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
    });

    // Make an AJAX request to retrieve the list of events
    fetch('/events/all')
        .then(response => response.json())
        .then(data => {
            const events = data.data; // Access the data property of the response object
            const options = [];

            // Populate the dropdown list with options
            events.forEach(event => {
                const option = document.createElement('option');
                option.value = event.id;
                option.text = event.title;
                options.push(option);
            });

            // Add the options to the dropdown list
            dropdownList.innerHTML = '';
            options.forEach(option => {
                dropdownList.appendChild(option);
            });
        })
        .catch(error => console.error('Error loading events:', error));
    </script>
@endsection
