@extends('frontend.layouts.main')

@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="thank-you-card text-center"
            style="padding: 2rem;
    border-radius: 1rem;
    background-color: #ffffff; ">
            <h1 class="display-4">Pendaftaran sudah ditutup</h1>
            <div class="mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                    stroke="#F44336" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
            </div>
            <p class="lead mt-4">Terima kasih atas antusiasmenya. Sampai jumpa di event berikutnya!</p>
            <a href="/event/{{ $event_id }}" class="btn btn-primary btn-lg mt-4">Kembali ke Laman Event</a>
        </div>
    </div>
@endsection
