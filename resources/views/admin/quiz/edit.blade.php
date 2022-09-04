<x-app-layout>
    <x-slot name="header">
        Quiz Güncelle
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="text-center card-title">sdasd</h5>
            <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $quiz->title }}"
                        placeholder="">
                </div>
                <div class="mb-3 form-group">
                    <label for="descr" class="form-label">Quiz Açıklaması</label>
                    <textarea type="text" name="descr" id="descr" class="form-control" placeholder="" rows="7">{{ $quiz->descr }}</textarea>
                </div>
                <div class="mb-3 form-group">
                    <label for="status" class="form-label">Quiz Durumu</label>
                    <select class="form-control" name="status" id="status">
                        <option @if ($quiz->questions_count < 4) disabled @endif
                            @if ($quiz->status === 'publish') selected @endif value="publish">
                            Aktif
                        </option>
                        <option @if ($quiz->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if ($quiz->status === 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>

                <div class="mb-3 form-group">
                    <input type="checkbox" id="isFinished" @if ($quiz->finished_at) checked @endif
                        class="mt-1 form-check-input mt-0">
                    <label for="finished_at" class="form-label">Bitiş Tarihi</label>
                </div>
                <div id="finishedInput" @if (!$quiz->finished_at) style="display: none" @endif
                    class="mb-3 form-group">
                    <label for="finished_at" class="form-label">Quiz Bitiş Tarih ve Saati</label>
                    <input type="datetime-local" value="{{ $quiz->finished_at}}" name="finished_at" id="finished_at"
                        class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="col-12 btn-block btn btn-outline-success">Quiz'i Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $("#isFinished").change(function() {
                if ($("#isFinished").is(":checked")) {
                    $("#finishedInput").show();
                } else {
                    $("#finishedInput").hide();
                }
            });
        </script>
    </x-slot>
</x-app-layout>
