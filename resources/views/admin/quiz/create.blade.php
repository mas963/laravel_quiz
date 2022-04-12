<x-app-layout>
    <x-slot name="header">Quiz oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="post" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label>Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Quiz açıklama</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox">
                    <label>Bitiş tarihi oluştur</label>
                </div>
                <div class="form-group">
                    <label>Bitiş tarihi</label>
                    <input type="datatime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>