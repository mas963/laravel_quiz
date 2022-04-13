<x-app-layout>
    <x-slot name="header">Quiz oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label>Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>Quiz açıklama</label>
                    <textarea name="description" class="form-control" rows="4">{{old('description')}}</textarea>
                </div>
                <div class="form-group mt-3">
                    <input id="isFinished" @if(old('finished_at')) checked @endif type="checkbox">
                    <label>Bitiş tarihi oluştur</label>
                </div>
                <div id="finishedInput" @if(!old('finished_at')) style="display: none" @endif class="form-group">
                    <label>Bitiş tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{old('finished_at')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block w-100 mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Quiz oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        @toastr_js
        @toastr_render
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
    <x-slot name="css">
        @toastr_css
    </x-slot>
</x-app-layout>