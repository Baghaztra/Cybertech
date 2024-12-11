@section('title', $form->title)
@extends('admin.layouts.head')
<section class="bg-image"
    style="background-image: url({{ $form->event->jumbotron ? "'" . asset('media/' . $form->event->jumbotron->path) . "'" : '/images/DSC_0029.JPG' }}); 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-size: cover;">
    <div class="mask d-flex align-items-center">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 m-4">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-3">{{ $form->title }}</h2>
                            <p>{{ $form->description }}</p>
                            <a href="/event/{{ $form->event->id }}" class="">Lihat event</a>
                            <form method="POST" class="row"style="place-content: center">
                                @csrf
                                {{-- <input type="hidden" name="response_token" value="{{ $responseToken }}"> --}}
                                <input type="hidden" name="form_id" value="{{ $form->id }}">
                                @foreach ($form->questions as $question)
                                    <div class="card shadow-sm mb-2 m-1">
                                        <div class="card-body">
                                            <div class="form-group">

                                                <label><strong>{{ $loop->iteration }}.
                                                        {{ $question->question_text }}</strong>
                                                        @if ($question->required == 1)
                                                        <abbr title="Required" class="text-danger">*</abbr>
                                                        @endif</label>
                                                @if (in_array($question->question_type, ['text', 'file']))
                                                    <!-- Input untuk pertanyaan tipe text -->
                                                    <input type="{{ $question->question_type }}"
                                                        name="question_[{{ $question->id }}]" class="form-control"
                                                        {{ $question->required == 1 ? 'required' : '' }}>
                                                @elseif ($question->question_type == 'multiple_choice')
                                                    <!-- Radio button untuk multiple choice -->
                                                    @foreach ($question->options as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                id="{{ $question->id . $option->option_text }}"
                                                                name="answers[{{ $question->id }}]"
                                                                value="{{ $option->option_text }}"
                                                                {{ $question->required == 1 ? 'required' : '' }}>
                                                            <label for="{{ $question->id . $option->option_text }}"
                                                                class="form-check-label">{{ $option->option_text }}</label>
                                                        </div>
                                                    @endforeach
                                                @elseif ($question->question_type == 'checkbox')
                                                    <!-- Checkbox untuk pertanyaan tipe checkbox -->
                                                    @foreach ($question->options as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input"
                                                                id="{{ $question->id . $option->option_text }}"
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
                                <div class="col-md-7 mt-3">
                                    <button type="submit" class="btn btn-success btn-lg w-100">Submit Form</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
