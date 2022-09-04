<x-app-layout>
    <x-slot name="header">
        Sorular
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a class="btn btn-sm btn-outline-primary m-2" href="{{ route('questions.create', $quiz->id) }}"> <i
                        class="fa fa-bolt" aria-hidden="true"></i>
                    Soru Oluştur</a>
                <p class="text-center"> "<i><a href="{{ route('quizzes.index') }}">{{ $quiz->title }}</a></i>" Quizine
                    Ait Sorular</p>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 160px" scope="col"> Fotoğraf</th>
                            <th scope="col">Soru</th>
                            <th scope="col">1. Cevap</th>
                            <th scope="col">2. Cevap</th>
                            <th scope="col">3. Cevap</th>
                            <th scope="col">4. Cevap</th>
                            <th scope="col">Doğru Cevap</th>
                            <th style="width: 75px" scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->questions as $question)
                            <tr class="text-center">
                                <td>
                                 @if ($question->image)
                                    <a  class="btn mt-4 btn-sm btn-outline-dark" target="_blank" href="{{ asset($question->image) }}">Görüntüle
                                    </a>
                                 @endif
                                </td>

                                <td>{{ $question->question }}</td>
                                <td>{{ $question->answer1 }}</td>
                                <td>{{ $question->answer2 }}</td>
                                <td>{{ $question->answer3 }}</td>
                                <td>{{ $question->answer4 }}</td>
                                <td>
                                    <div class="mt-4 badge bg-success"><strong>{{ substr($question->correct_answer, -1) }}.
                                            Cevap</strong></div>
                                </td>
                                <td class="text-center">

                                    <a class=" m-2 btn-sm btn btn-outline-primary"
                                        href="{{ route("questions.edit",[$quiz->id,  $question->id]) }}"><i class="fa fa-pen"
                                            aria-hidden="true"></i></a>
                                    <form method="post" action="{{ route('quizzes.destroy', $question->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Sil"
                                            class=" m-2 btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="shadow-lg p-3 mb-5 bg-body rounded"> <b> </b></div>

            </div>
        </div>
    </div>
</x-app-layout>
