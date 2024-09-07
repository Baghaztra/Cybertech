@section('title', $form->title)
@extends('admin.layouts.head')
<div class="container">
    <h1>{{ $form->title }}</h1>
    <p>{{ $form->description }}</p>

    <!-- Form untuk user mengisi jawaban -->
    <form method="POST">
        @csrf

        @foreach ($form->questions as $question)
            <div class="form-group">
                <label for="question_{{ $question->id }}">{{ $question->question_text }}</label>
                @if (in_array($question->question_type, ['text', 'file']))
                    <!-- Input untuk pertanyaan tipe text -->
                    <input type="{{ $question->question_type }}" name="answers[{{ $question->id }}]" class="form-control"
                        required>
                @elseif ($question->question_type == 'multiple_choice')
                    <!-- Radio button untuk multiple choice -->
                    @foreach ($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                value="{{ $option->option_text }}" required>
                            <label class="form-check-label">{{ $option->option_text }}</label>
                        </div>
                    @endforeach
                @elseif ($question->question_type == 'checkbox')
                    <!-- Checkbox untuk pertanyaan tipe checkbox -->
                    @foreach ($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="answers[{{ $question->id }}][]"
                                value="{{ $option->option_text }}">
                            <label class="form-check-label">{{ $option->option_text }}</label>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach

        <!-- Tombol submit -->
        <button type="submit" class="btn btn-success">Submit Form</button>
    </form>
</div>
{{-- @endsection --}}
