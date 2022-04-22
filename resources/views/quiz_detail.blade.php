<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <ul class="list-group">
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son katılım tarihi
                            <span title="{{$quiz->finished_at}}" class="badge bg-secondary">{{ $quiz->finished_at->diffForHumans().' bitiyor' }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru sayısı
                            <span class="badge bg-secondary">{{ $quiz->questions_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama puan
                            <span class="badge bg-secondary">60</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                    </p>
                    <a href="#" class="btn  btn-primary btn-block btn-sm w-100">Quiz'e Katıl</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
