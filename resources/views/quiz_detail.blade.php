<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <ul class="list-group">
                        @if($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralama
                                <span class="badge bg-success">{{ $quiz->my_rank }}</span>
                            </li>
                        @endif
                        @if($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puan
                                <span class="badge bg-primary">{{ $quiz->my_result->point }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru / Yanlış Sayısı
                                <div class="float-right">
                                    <span class="badge bg-success">{{ $quiz->my_result->correct }} Doğru</span>
                                    <span class="badge bg-danger">{{ $quiz->my_result->wrong }} Yanlış</span>
                                </div>
                            </li>
                        @endif
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
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı sayısı
                                <span class="badge bg-secondary">{{$quiz->details['join_count']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama puan
                                <span class="badge bg-secondary">{{$quiz->details['average']}}</span>
                            </li>
                        @endif
                    </ul>
                    @if(count($quiz->topTen) > 0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">İlk 10</h5>
                            <ul class="list-group">
                                @foreach ($quiz->topTen as $result)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="h5">{{$loop->iteration}}. </strong>
                                        <img class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}">
                                        <span @if(auth()->user()->id == $result->user_id) class="text-success" @endif>{{$result->user->name}}</span>
                                        <span class="badge bg-success">{{$result->point}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                </p>
                @if($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn  btn-success btn-block btn-sm w-100">Quizimi görüntüle</a>
                @else
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn  btn-primary btn-block btn-sm w-100">Quize Katıl</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
