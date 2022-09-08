<x-app-layout>
    <x-slot name="header">
        Quiz Detayları
    </x-slot>
    <div class="row">
        <div class="mt-2 col-12 col-md-4">
            <ul class="list-group">
                @if ($quiz->my_result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puan: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="badge bg-success rounded-pill">{{ $quiz->my_result->point }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->correct }}</span>
                        Yanlış
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="badge bg-warning rounded-pill">{{ $quiz->my_result->wrong }}</span>
                    </li>
                @endif

                @if ($quiz->details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Katılımcı Sayısı <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="badge bg-info rounded-pill">{{ $quiz->details['join_count'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="badge bg-success rounded-pill">{{ $quiz->details['average'] }}</span>
                    </li>
                @endif

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Soru Sayısı: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="badge bg-dark rounded-pill">{{ $quiz->questions_count }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Quiz için son tarih: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <p class="text-danger ">
                        <span @if ($quiz->finished_at) title="($quiz->finished_at)" @endif
                            class="badge bg-danger rounded-pill">
                            @if ($quiz->finished_at)
                                {{ \Carbon\Carbon::parse($quiz->finished_at)->diffForHumans(now()) . ' bitiyor' }}
                            @else
                                Tarih Bilgisi Yok
                            @endif
                        </span>
                </li>
            </ul>
     @if (count($quiz->topTen))
     <div class="mt-2 card">
        <div class="card-header">
            İlk 10
        </div>
        <ul class="list-group">
            @foreach ($quiz->topTen as $result)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>{{ $loop->iteration }}.</strong>
                    <img src="{{ $result->user->profile_photo_url }}" class="w-8 rounded-circle float-left"
                        alt="">

                    {{ $result->user->name }}

                    <span class="badge bg-dark rounded-pill"><i class="fa fa-hand-pointer m-1"
                            aria-hidden="true"></i>{{ $result->point }}

                    </span>
                </li>
            @endforeach
        </ul>
    </div>
     @endif
        </div>
        <div class="mt-2 col-12 col-md-8">
            <div class="card">
                <div class="card text-dark  bg-light text-center">
                    <img class="card-img-center img-fluid mx-auto d-block"
                        src="https://www.securecare.com/wp-content/uploads/2021/03/page-header-background.jpg"
                        alt="Card image cap">
                    <div class="card-img-overlay">
                        <div class="mt-3 text-white card-header">
                            {{ $quiz->title }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hoş Geldiniz!</strong> Quiz hakkında detaylı bilgilere sahip olduktan sonra butona
                            tıklayarak başlayabilirsiniz.
                            </button>
                        </div>
                        <div class="card-footer text-dark">
                            <p class="card-text">{{ $quiz->descr }}</p>
                        </div>
                    </div>
                </div>
                @if (!$quiz->my_result)
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn mt-2 col-12 btn-outline-dark">Quize
                        Git</a>
                @else
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn mt-2 col-12 btn-outline-success">Quizi
                        Görüntüle</a>
                @endif

                <br>

            </div>
        </div>
    </div>
</x-app-layout>
