@extends('frontend.layouts.main')

@section('content')
<div style="background-color: black; height: 54px; z-index: -1;" class="navbar navbar-expand-md navbar-dark fixed-top"></div>
<div style="height: 200px"></div>
<div class="container mt-5 row justify-content-center">

    @foreach ($events as $event)
        <div class="card mb-3 col-7">
            <div class="row justify-content-center">
                @if($event->images->isNotEmpty())
                <img src="{{ 
                    (strpos($event->jumbotron->path ?? $event->images->first()->path, 'http') === 0) 
                    ? ($event->jumbotron->path ?? $event->images->first()->path) 
                    : asset('storage/media/' . ($event->jumbotron->path ?? $event->images->first()->path)) 
                }}" class="card-img-top" style="height: 200px; width: fit-content">
                @else
                    <img class="card-img-top" src="{{ asset('default-image.jpg') }}" alt="Default Image" style="height: 200px; width: fit-content" />
                @endif
            </div>

            <div class="card-body">
                <h4 class="card-title">{{ $event->title }}</h4>
                <div class="card-text">{!! $event->description !!}</div>
                <p class="card-text"><small class="text-muted">{{ $event->event_date }}</small></p>
                @if($event->form)
                    <a href="{{ "/form/" . $event->form->id }}" class="btn btn-primary">Register</a>
                @elseif($event->registration_url)
                    <a href="{{ $event->registration_url }}" class="btn btn-primary">Register</a>
                @endif
                <a href="/event/{{ $event->id }}" class="btn btn-secondary">Details</a>
            </div>
        </div>
    @endforeach
</div>

@endsection
