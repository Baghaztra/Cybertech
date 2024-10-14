@extends('frontend.layouts.main')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="thank-you-card text-center" style="padding: 2rem;
    border-radius: 1rem;
    background-color: #ffffff; ">
        <h1 class="display-4">TERIMA KASIH!</h1>
        <div class="mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto">
                <path d="M20 6L9 17l-5-5"></path>
            </svg>
        </div>
        <p class="lead mt-4">Terima kasih telah mendaftar! Informasi selanjutnya akan disampaikan via WhatsApp.</p>
        <a href="/event/{{ $event_id }}" class="btn btn-primary btn-lg mt-4">Kembali ke Laman Event</a>
        <p class="mt-4">Kami tidak sabar untuk bertemu dengan Anda!</p>
    </div>
</div>

@endsection
