<x-app-layout>
    <x-slot name="header">
        Quiz
    </x-slot>
    <form method="POST" action="{{ route('quiz.result', $quiz->slug) }}">
        @csrf
        @foreach ($quiz->questions as $question)
            <div class="card mt-2 text-start">
                @if ($question->image)
                    <img class="mt-2 card-img-center img-fluid mx-auto d-block" src="{{ asset($question->image) }}"
                        alt="Title">
                @endif
                <div class="card-body">
                    <h4 class="card-title"><strong>#{{ $loop->iteration }} </strong>
                        &nbsp;&nbsp;{{ $question->question }}
                    </h4>
                    <hr class="mt-3">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="quiz{{ $question->id }}1"
                            name="{{ $question->id }}" value="answer1" required><strong>A-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="quiz{{ $question->id }}2"
                            name="{{ $question->id }}" value="answer2" required><strong>B-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="quiz{{ $question->id }}3"
                            name="{{ $question->id }}" value="answer3" required><strong>C-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="quiz{{ $question->id }}4"
                            name="{{ $question->id }}" value="answer4" required><strong>D-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="quiz{{ $question->id }}5"
                            name="{{ $question->id }}" value="empty" required><strong>E-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}5">
                            {{ $question->empty }}</label>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-2 shadow-lg p-3 mb-5 bg-light !color "><button class="btn col-12 btn-outline-success"
                type="submit">Sınavı Bitir </button></div>
    </form>
</x-app-layout>
