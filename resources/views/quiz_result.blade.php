<x-app-layout>
    <x-slot name="header">
        Quiz Sonuçları
    </x-slot>

    <div class="alert text-center alert-light" role="alert">
        <strong>Yanlış Cevap</strong> <i class="fa fa-remove text-danger" aria-hidden="true"></i><br>
        <strong>Doğru Cevap</strong> <i class="fa text-success fa-check" aria-hidden="true"></i></i><br>
        <strong>Senin Cevabın</strong> <i class="fa text-danger fa-arrow-right" aria-hidden="true"></i></i><br>
        <ul class="list-group mt-2">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Alınan Puan
            <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Toplam Doğru
            <span class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Toplam Yanlış
            <span class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }}</span>
          </li>
        </ul>
    </div>
    @foreach ($quiz->questions as $question)
        <div class="card mt-2 text-start">
           <div class="shadow-lg p-3 text-center mb-5 bg-dark !spacing ">
            <span class="text-white "> Katılımcılar bu soruya <strong>%{{ $question->true_percent }}</strong> oranında doğru cevap verdi.</span>
           </div>
            @if ($question->image)
                <img class="mt-2 card-img-center img-fluid mx-auto d-block" src="{{ asset($question->image) }}"
                    alt="Title">
            @endif
            <div class="card-body">
                <h4 class="card-title">
                    @if ($question->correct_answer == $question->my_answer->answer)
                        <i class="fa text-success fa-check" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-remove text-danger" aria-hidden="true"></i>
                    @endif
                    @if ($question->correct_answer == $question->my_answer->answer)
                        <strong>{{ $loop->iteration }} </strong>
                        &nbsp;&nbsp;<strong class="text-success">{{ $question->question }}</strong>
                    @else
                        &nbsp;&nbsp;<strong class="text-danger">{{ $question->question }}</strong>
                    @endif
                </h4>
                <hr class="mt-3">
                <div class="form-check">
                    @if ('answer1' == $question->correct_answer)
                        <i class="fa text-success fa-check" aria-hidden="true"></i>
                    @endif
                    @if (!'answer1' == $question->my_answer->answer)
                        <i class="fa text-danger fa-arrow-right" aria-hidden="true"></i>
                    @endif
                    <strong>
                        A-)</strong>
                    <label class="form-check-label" for="quiz{{ $question->id }}1">
                        {{ $question->answer1 }}</label>
                </div>
                <div class="form-check">
                    @if (!'answer2' == $question->correct_answer)
                        <i class="fa text-success fa-check" aria-hidden="true"></i>
                        @endif @if ('answer2' == $question->my_answer->answer)
                            <i class="fa text-danger fa-arrow-right" aria-hidden="true"></i>
                        @endif
                        <strong>
                            B-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}</label>
                </div>
                <div class="form-check">
                    @if (!'answer3' == $question->correct_answer)
                        <i class="fa text-success fa-check" aria-hidden="true"></i>
                    @endif
                    @if ('answer3' == $question->my_answer->answer)
                        <i class="fa text-danger fa-arrow-right" aria-hidden="true"></i>
                    @endif
                    <strong>
                        C-)</strong>
                    <label class="form-check-label" for="quiz{{ $question->id }}3">
                        {{ $question->answer3 }}</label>
                </div>
                <div class="form-check">
                    @if (!'answer4' == $question->correct_answer)
                        <i class="fa text-success fa-check" aria-hidden="true"></i>
                        @endif @if ('answer4' == $question->my_answer->answer)
                            <i class="fa text-danger fa-arrow-right" aria-hidden="true"></i>
                        @endif
                        <strong>D-)</strong>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}</label>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
