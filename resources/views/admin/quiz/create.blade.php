<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur
    </x-slot>
    <div class="card  ">
        <div class="card-body">
            <h5 class="text-center card-title"></h5>
            <form method="POST" action="{{ route('quizzes.store') }}">
                @csrf

                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="descr" class="form-label">Quiz Açıklaması</label>
                    <textarea type="text" name="descr" id="descr" class="form-control" placeholder="" rows="7"></textarea>
                </div>
                <div class="mb-3 form-group">
                    <input type="checkbox" id="isFinished"
                        class="mt-1 form-check-input mt-0">
                    <label for="finished_at" class="form-label">Bitiş Tarihi</label>
                </div>
                <div id="finishedInput" style="display: none"  class="mb-3 form-group">
                    <label for="finished_at" class="form-label">Quiz Bitiş Tarih ve Saati</label>
                    <input type="datetime-local" name="finished_at" id="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="col-12 btn-block btn btn-outline-success">Quiz'i Oluştur</button>
                </div>

            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $("#isFinished").change(function(){
               if($("#isFinished").is(":checked")) {
                $("#finishedInput").show();
               }else{
                $("#finishedInput").hide();

               }
            });
        </script>
    </x-slot>
</x-app-layout>
