<x-app-layout>
    <x-slot name="header">
        Soru Oluştur
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="text-center card-title"></h5>
            <p class="text-center">"<i>{{ $quiz->title }}</i>" için yeni soru oluştur.</p>
            <form method="POST" enctype="multipart/form-data" action="{{ route("questions.store", $quiz->id) }}">
                @csrf
                <div class="mb-3 form-group">
                    <label for="question" class="form-label">Soru</label>
                    <textarea type="text" name="question" id="question" class="form-control" value=""
                        rows="4" placeholder="">{{ old('question') }}</textarea>
                </div>
                <div class="mb-3 form-group">
                    <label for="image" class="form-label">Fotoğraf</label>
                    <input type="file" name="image" class="form-control" id="image">

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="answer1" class="form-label">1. Cevap</label>
                                <textarea type="text" name="answer1" id="answer1" class="form-control" value="" rows="2"
                                    placeholder="">{{ old('answer1') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="answer2" class="form-label">2. Cevap</label>
                                <textarea type="text" name="answer2" id="answer2" class="form-control" value="" rows="2"
                                    placeholder="">{{ old('answer2') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="answer3" class="form-label">3. Cevap</label>
                                <textarea type="text" name="answer3" id="answer3" class="form-control" value="" rows="2"
                                    placeholder="">{{ old('answer3') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="answer4" class="form-label">4. Cevap</label>
                                <textarea type="text" name="answer4" id="answer4" class="form-control" value="" rows="2"
                                    placeholder="">{{ old('answer4') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 form-group">

                        <label for="finished_at" class="form-label">Bitiş Tarihi</label>
                        <select name="correct_answer" class="form-control" id="">
                            <option @if(old("correct_answer")=="answer1") selected @endif  value="answer1">1. Cevap</option>
                            <option @if(old("correct_answer")=="answer2") selected @endif value="answer2">2. Cevap</option>
                            <option @if(old("correct_answer")=="answer3")  selected @endif value="answer3">3. Cevap</option>
                            <option @if(old("correct_answer")=="answer4") selected @endif value="answer4">4. Cevap</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="col-12 btn-block btn btn-outline-success">Soruyu Ekle</button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>
