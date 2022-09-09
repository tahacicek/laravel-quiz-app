<x-app-layout>
    <x-slot name="header">
        Ana Sayfa
    </x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="m-5 list-group">
                @foreach ($quizzes as $quiz)
                    <a href="{{ route('quiz.detail', $quiz->slug) }}"
                        class="mt-2 list-group-item list-group-item-action flex-column align-items-start"
                        aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 display-6">{{ $quiz->title }}</h5>
                            @if ($quiz->finished_at)
                                <small
                                    class="text-dark">{{ \Carbon\Carbon::parse($quiz->finished_at)->diffForHumans() . ' bitiyor' }}</small>
                            @else
                                <small class="text-dark">Belirtilmedi</small>
                            @endif
                        </div>
                        <p class="mb-1">{{ Str::limit($quiz->descr, 100) }}</p>
                        <small class="text-muted ">Toplam {{ $quiz->questions_count }} Soru</small>
                    </a>
                @endforeach
                <div class="shadow-lg p-3 mt-5 mb-5 bg-body rounded"> <b>
                        {{ $quizzes->links() }}</b></div>
            </div>
        </div>
        <div class="m-5 card" style="width:16rem;">
            <img src="https://66.media.tumblr.com/028dbe45cd2e8ad105465584200ff915/tumblr_mgxvou3Gxg1qzmz4co1_1280.jpg"
                class="card-img-top img-fluid img-thumbnail img-responsive" alt="...">
            <h5 class="text-center card-title">Card title</h5>
            <!-- Hover added -->
            <div class="list-group">
                @foreach ($results as $result)
                    <a target="_blank" href="{{ route('quiz.detail', $result->quiz->slug) }}"
                        class="list-group-item list-group-item-action list-group-item-dark">
                        <strong>{{ $result->point }}</strong> -
                        {{ $result->quiz->title }}
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
