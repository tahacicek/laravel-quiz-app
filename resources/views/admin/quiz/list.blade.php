<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a class="btn btn-sm btn-outline-primary m-2" href="{{ route('quizzes.create') }}"> <i class="fa fa-bolt"
                        aria-hidden="true"></i>
                    Quiz Oluştur</a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis placeat nemo fugit laborum
                    optio itaque est quisquam fuga excepturi quibusdam iure voluptatum earum repudiandae corporis,
                    dignissimos cupiditate commodi odit.</p>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Quiz</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr class="text-center">
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->status }}</td>
                                <td>{{ $quiz->finished_at }}</td>
                                <td class="text-center">
                                    <a class=" m-2 btn-sm btn btn-outline-warning"
                                        href="{{ route("questions.index", $quiz->id) }}"><i class="fa fa-question"
                                            aria-hidden="true"></i></a>
                                    <a class=" m-2 btn-sm btn btn-outline-primary"
                                        href="{{ route('quizzes.edit', $quiz->id) }}"><i class="fa fa-pen"
                                            aria-hidden="true"></i></a>
                                    <form method="post" action="{{ route('quizzes.destroy', $quiz->id) }}">
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
                <div class="shadow-lg p-3 mb-5 bg-body rounded"> <b> {{ $quizzes->links() }}</b></div>

            </div>
        </div>
    </div>
</x-app-layout>
