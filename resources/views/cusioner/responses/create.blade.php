@section('title', $form->title)
@extends('admin.layouts.head')
<div class="container d-flex justify-content-center align-items-center">
    <style>
        .form {
            scroll-behavior: smooth;
            width: 100%;
            height: 100%;
            overflow: auto;
        }
    </style>
    <div class="row d-flex justify-content-center p-4 my-4 rounded shadow bg-white"
        style="width: 90vw">
        {{-- Poster --}}
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card bg-primary " style="width: 100%; height: fit-content">
                <img src="{{asset('storage/media/' . $form->event->poster->path) }}" class="card-img-top p-2" alt="form-pendaftaran" style="width: 100%; height: auto; max-height: 180vh"/>
            </div>
        </div>
        {{-- Formulir --}}
        <div class="col-md-6  form ">
            <div class="row" style="place-content: center">
                <div class="shadow-sm card p-2 mb-2" style="border-top: 10px solid black;">
                    <div class="card-body">
                        <h1 class="h1">{{ $form->title }}</h1>
                        <p>{{ $form->description }}</p>
                    </div>
                </div>
            </div>
            <!-- Form untuk user mengisi jawaban -->
            <form method="POST" class="row"style="place-content: center">
                @csrf
                {{-- <input type="hidden" name="response_token" value="{{ $responseToken }}"> --}}
                <input type="hidden" name="form_id" value="{{ $form->id }}">
                @foreach ($form->questions as $question)
                    <div class="card shadow-sm mb-2 m-1">
                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>{{ $loop->iteration }}.
                                        {{ $question->question_text }}</strong></label>
                                @if (in_array($question->question_type, ['text', 'file']))
                                    <!-- Input untuk pertanyaan tipe text -->
                                    <input type="{{ $question->question_type }}" name="question_[{{ $question->id }}]"
                                        class="form-control" {{ $question->required == 1 ? 'required':'' }}>
                                @elseif ($question->question_type == 'multiple_choice')
                                    <!-- Radio button untuk multiple choice -->
                                    @foreach ($question->options as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                id="{{ $question->id . $option->option_text }}"
                                                name="answers[{{ $question->id }}]" value="{{ $option->option_text }}"
                                                {{ $question->required == 1 ? 'required':'' }}>
                                            <label for="{{ $question->id . $option->option_text }}"
                                                class="form-check-label">{{ $option->option_text }}</label>
                                        </div>
                                    @endforeach
                                @elseif ($question->question_type == 'checkbox')
                                    <!-- Checkbox untuk pertanyaan tipe checkbox -->
                                    @foreach ($question->options as $option)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                id="{{ $question->id . $option->option_text }}" type="checkbox"
                                                name="answers[{{ $question->id }}][]"
                                                value="{{ $option->option_text }}">
                                            <label class="form-check-label"
                                                for="{{ $question->id . $option->option_text }}">{{ $option->option_text }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Tombol submit -->
                <div class="card shadow-sm col-md-7">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success w-100">Submit Form</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
