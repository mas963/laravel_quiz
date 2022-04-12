<x-app-layout>
    <x-slot name="header">Quiz oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label>Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Quiz açıklama</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group mt-3">
                    <input id="isFinished" type="checkbox">
                    <label>Bitiş tarihi oluştur</label>
                </div>
                <div id="finishedInput" style="display: none" class="form-group">
                    <label>Bitiş tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block w-100 mt-3">Quiz oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if ($('#isFinished').is(':checked')) {
                    $('#finishedInput').show();
                } else {
                    $('#finishedInput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>