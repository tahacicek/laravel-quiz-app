<x-app-layout>
    <x-slot name="header">
        Quiz Detayları
    </x-slot>
    <div class="row">
        <div class="mt-2 col-12 col-md-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Katılımcı Sayısı <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="badge bg-dark rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ortalama Puan: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="badge bg-dark rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Soru Sayısı: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="badge bg-dark rounded-pill">{{ $quiz->questions_count }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Quiz için son tarih: <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <p class="text-danger ">
                        <span @if ($quiz->finished_at) title="($quiz->finished_at)" @endif
                            class="badge bg-dark rounded-pill">
                            @if ($quiz->finished_at)
                                {{ \Carbon\Carbon::parse($quiz->finished_at)->diffForHumans(now()) . ' bitiyor' }}
                            @else
                                Tarih Bilgisi Yok
                            @endif
                        </span>
                </li>
            </ul>
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
                <a href="{{ route("quiz.join", $quiz->slug) }}" class="btn mt-2 col-12 btn-outline-dark">Quize Git</a>
                <br>

            </div>
        </div>
    </div>
</x-app-layout>
