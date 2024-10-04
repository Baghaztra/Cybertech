@extends('frontend.layouts.main')

@section('content')
<div style="height: 100px"></div>
<div class="card mb-3">
    {{-- @dd($event->description) --}}
    @if($event->images->isNotEmpty())
        <img class="card-img-top" src="{{ asset('storage/media/' . $event->images->first()->path) }}" alt="{{ $event->title }}" style="height: 100px; width: fit-content" />
    @else
        <img class="card-img-top" src="{{ asset('default-image.jpg') }}" alt="Default Image" style="height: 100px; width: fit-content" />
    @endif

    <div class="card-body">
        <h4 class="card-title">{{ $event->title }}</h4>
        <div class="card-text">{!! $event->description !!}</div>
        <p class="card-text"><small class="text-muted">{{ $event->event_date }}</small></p>
        @if($event->registration_url)
            <a href="{{ $event->registration_url }}" class="btn btn-primary">Register</a>
        @endif
        <a href="/event/{{ $event->id }}" class="btn btn-secondary">Details</a>
    </div>
</div>

@endsection
