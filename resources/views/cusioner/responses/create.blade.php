@section('title', $form->title)
@extends('admin.layouts.head')
<div class="container">
    <div class="row" style="place-content: center">
        <div class="col-md-7 col-sm-12 shadow-sm card p-2 mb-2 mt-5" style="border-top: 10px solid black;">
            <div class="card-body">
                <h1 class="h1">{{ $form->title }}</h1>
                <p>{{ $form->description }}</p>
            </div>
        </div>
    </div>
    <!-- Form untuk user mengisi jawaban -->
    <form method="POST" class="row"style="place-content: center">
        @csrf
        <input type="hidden" name="response_token" value="{{ $responseToken }}">
        @foreach ($form->questions as $question)
            <div class="card shadow-sm col-md-7 mb-2 m-1 col-sm-12">
                <div class="card-body">
                    <div class="form-group">
                        <label><strong>{{ $loop->iteration }}.
                                {{ $question->question_text }}</strong></label>
                        @if (in_array($question->question_type, ['text', 'file']))
                            <!-- Input untuk pertanyaan tipe text -->
                            <input type="{{ $question->question_type }}" name="question_[{{ $question->id }}]"
                                class="form-control" required>
                        @elseif ($question->question_type == 'multiple_choice')
                            <!-- Radio button untuk multiple choice -->
                            @foreach ($question->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="{{ $question->id . $option->option_text }}"
                                        name="answers[{{ $question->id }}]" value="{{ $option->option_text }}" required>
                                    <label for="{{ $question->id . $option->option_text }}"
                                        class="form-check-label">{{ $option->option_text }}</label>
                                </div>
                            @endforeach
                        @elseif ($question->question_type == 'checkbox')
                            <!-- Checkbox untuk pertanyaan tipe checkbox -->
                            @foreach ($question->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" id="{{ $question->id . $option->option_text }}"
                                        type="checkbox" name="answers[{{ $question->id }}][]"
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
{{-- @endsection --}}
