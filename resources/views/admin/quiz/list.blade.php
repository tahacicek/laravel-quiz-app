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
            <form class="" method="GET" action="">

                <div class="d-flex justify-content-center">
                    <div class="mt-4 form shadow-lg p-4 bg-body rounded row">
                        <div class="col-md-5">
                            <input type="text" name="title" value="{{ request()->get('title') }}"
                                placeholder="Quiz Adı" class="form-control" id="">
                        </div>
                        <div class="col-md-5">
                            <select class="form-select" onchange="this.form.submit()" name="status" id="">
                                <option value=""><small>Durumu</small></option>
                                <option @if (request()->get('status') == 'publish') selected @endif value="publish">Akitf</option>
                                <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                                <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            @if (request()->get('title') || request()->get('status'))
                                <a class="btn btn-sm btn-danger" href="{{ route('quizzes.index') }}"><i
                                        class="fa fa-1x fa-filter" aria-hidden="true"></i></a>
                            @endif

                        </div>
                    </div>

                </div>

            </form>
            <div class="mt-3 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Quiz</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr class="text-center">
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->questions_count }}</td>
                                <td>
                                    <div class="mt-4">
                                        @switch($quiz->status)
                                            @case('publish')
                                                <span class="badge bg-success">Aktif</span>
                                            @break

                                            @case('passive')
                                                <span class="badge bg-danger">Pasif</span>
                                            @break

                                            @case('draft')
                                                <span class="badge bg-warning">Taslak</span>
                                            @break
                                        @endswitch
                                    </div>
                                </td>
                                <td class="mt-4">
                                    @if ($quiz->finished_at)
                                        <p class="mt-4" title="{{ $quiz->finished_at }}">
                                            {{ \Carbon\Carbon::parse($quiz->finished_at)->diffForHumans(now()) }}</p>
                                    @else
                                        <p class="mt-4">Tarih Belirtilmedi</p>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class=" m-2 btn-sm btn btn-outline-warning"
                                        href="{{ route('questions.index', $quiz->id) }}"><i class="fa m-1 fa-question"
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
                <div class="shadow-lg p-3 mt-5 mb-5 bg-body rounded"> <b>
                        {{ $quizzes->withQueryString()->links() }}</b></div>
            </div>
        </div>
    </div>
</x-app-layout>
