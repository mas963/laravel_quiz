<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    
    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <h5 class="card-title" style="float: left;">
                    <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
                </h5>
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

                    <table class="table table-striped mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Ad soyad</th>
                            <th scope="col">Puan</th>
                            <th scope="col">Doğru</th>
                            <th scope="col">Yanlış</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz->results as $result)
                          <tr>
                            <td>{{$result->user->name}}</td>
                            <td>{{$result->point}}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->wrong}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
